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

	public function loadAllBooks()
	{
		return $this->ci->book_model->loadAll();
	}

	public function getBook($id)
	{
		return $this->ci->book_model->getBook($id)[0];
	}
}
