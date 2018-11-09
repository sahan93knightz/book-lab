<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 11/3/18
 * Time: 3:20 PM
 */

class ClientLib
{

	/**
	 * clientlib constructor.
	 */
	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->library('categorylib');
		$this->ci->load->library('booklib');
		$this->ci->load->library('cart');

		if (!$this->ci->session->has_userdata('uid')) {
			$this->ci->session->set_userdata('uid', uniqid());
		}

		$categories = $this->ci->categorylib->loadAllCategories();
		$this->ci->data = array('categories' => $categories);

	}

	function addToCart($bookId, $qty)
	{

		try {
			$book = $this->ci->booklib->getBook($bookId);
			$item = array(
				'id' => $book->id,
				'qty' => $qty,
				'price' => $book->unit_price,
				'name' => $book->title,
				'options' => array('book' => $book)
			);
			$this->ci->cart->product_name_rules = '[:print:]';
			$this->ci->cart->insert($item);
		} catch (Exception $e) {
			throw new RuntimeException($e);
		}
	}

	function removeFromCart($bookId)
	{
		$this->ci->cart->remove($bookId);
	}
}
