<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
	/**
	 * Client constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('clientlib');
		$this->load->library('booklib');
		$this->load->helper('url');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['most_viewed_categories'] = $this->categorylib->mostViewedCategories();
		$this->data['most_viewed_books'] = $this->booklib->getMostViewedBooksAll();
		$this->load->view('home', $this->data);
	}

}
