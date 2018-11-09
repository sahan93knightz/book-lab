<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 10/18/18
 * Time: 11:17 AM
 */

class BookLib
{

	/**
	 * BookLib constructor.
	 */
	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('book_model');
		$this->ci->load->model('book_statistics_model');
	}

	public function save($title, $author, $category_id, $unit_price, $description, $image_name, $id = 0)
	{
		if ($title == '') {
			throw new RuntimeException('Title cannot be empty');
		}

		if ($author == '') {
			throw new RuntimeException('Author cannot be empty');
		}

		$this->checkAvailability($title, $id);
		if ($id == 0) {
			return $this->ci->book_model->save($title, $author, $category_id, $unit_price, $description, $image_name, date("Y-m-d H:i:s"));
		} else {
			return $this->ci->book_model->update($id, $title, $author, $category_id, $unit_price, $description, $image_name);
		}
	}

	public function checkAvailability($title, $id)
	{
		$bookResult = $this->ci->book_model->idNotEqualAndNameEqual($id, $title);
		if ($bookResult->num_rows() > 0) {
			throw new RuntimeException('Book is already created');
		}
	}


	public function loadBooksByCategory($categoryId, $page = 0, $perPage = 0)
	{
		return $this->ci->book_model->loadBooksByCategory($categoryId, $page, $perPage);
	}

	public function countBooksByCategory($categoryId)
	{
		return $this->ci->book_model->countBooksByCategory($categoryId);
	}

	public function loadAllBooks()
	{
		return $this->ci->book_model->loadAll();
	}

	public function getBook($id)
	{
		return $this->ci->book_model->getBook($id)[0];
	}

	function markProductView($bookId)
	{
		$uid = $this->ci->session->userdata('uid');
		if (!$this->ci->book_statistics_model->alreadyAdded($bookId, $uid))
			$this->ci->book_statistics_model->save($bookId, $uid, date("Y-m-d H:i:s"));
	}

	function getMostViewedBooks($bookId)
	{
		return $this->ci->book_model->getMostViewedBooks($bookId);
	}

	function getMostViewedBooksAll()
	{
		return $this->ci->book_model->getMostViewedBooksAll();
	}

	function getStats($bookId)
	{
		$stat = array();
		$stat['month'] = $this->ci->book_statistics_model->viewCountForTheMonth($bookId);
		$stat['all'] = $this->ci->book_statistics_model->viewCountAllTime($bookId);
		return $stat;
	}
}
