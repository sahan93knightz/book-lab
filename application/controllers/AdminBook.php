<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBook extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('authlib');
		$this->authlib->auth();
		$this->load->library('categorylib');
		$this->load->library('booklib');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
	}

	public function index()
	{
		$data = array('title' => '', 'id' => '', 'author' => '', 'unit_price' => '', 'description' => '');
		$data['categories'] = $this->categorylib->loadAllCategories();
		try {
			if ($this->input->method() == 'post') {
				$field_name = "cover_image";
				if ($this->upload->do_upload($field_name)) {
					$title = $this->input->post('title');
					$id = $this->input->post('id');
					$author = $this->input->post('author');
					$category_id = $this->input->post('category_id');
					$unit_price = $this->input->post('unit_price');
					$description = $this->input->post('description');
					$image_name = $this->upload->data('file_name');
					$this->booklib->save($title, $author, $category_id, $unit_price, $description, $image_name, $id);
					$data['msg'] = 'Book Created Successfully';
				} else {
					$data['errmsg'] = $this->upload->display_errors();
				}
			} else {

			}
		} catch (Exception $e) {
			$data['errmsg'] = $e->getMessage();
		}
		$data['books'] = $this->booklib->loadAllBooks();
		$this->load->view('admin/book', $data);
	}

	public function view($bookId)
	{
		$book = $this->booklib->getBook($bookId);
		$stats = $this->booklib->getStats($bookId);
		$data = array('book' => $book, 'stats' => $stats);
		$this->load->view('admin/book_details', $data);
	}

}
