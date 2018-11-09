<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 11/3/18
 * Time: 3:18 PM
 */

class Book extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('clientlib');
	}


	public function productLookupById($bookId)
	{
		$book = $this->booklib->getBook($bookId);
		$this->booklib->markProductView($bookId);
		$category = $this->categorylib->getCategory($book->category_id);
		$this->data['book'] = $book;
		$this->data['books'] = $this->booklib->getMostViewedBooks($bookId);
		$this->data['selectedCategory'] = $category;
		$this->load->view('book_details', $this->data);
	}

	public function addToCart()
	{
		$bookId = $this->input->post('bookId');
		$qty = $this->input->post('qty');
		$this->clientlib->addToCart($bookId, $qty);
		redirect('book/' . $bookId);
	}

	public function removeFromCart($id)
	{
		$this->clientlib->removeFromCart($id);
		echo 'Success ' . $id;
	}

}
