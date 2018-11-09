<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCategory extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('authlib');
		$this->authlib->auth();
		$this->load->library('categorylib');
	}

	public function index()
	{
		$data = array('category_name' => '', 'category_id' => '');
		if ($this->input->method() == 'post') {
			$categoryName = $this->input->post('category_name');
			$id = $this->input->post('category_id');
			try {
				$this->categorylib->save($categoryName, $id);
				$data['msg'] = 'Category Created Successfully';
			} catch (Exception $e) {
				$data['errmsg'] = $e->getMessage();
			}
		} else if ($this->input->method() == 'get') {
			$id = $this->input->get('id');
			if (isset($id)) {
				try {
					$category = $this->categorylib->getCategory($id);
					$data['category_name'] = $category->category_name;
					$data['category_id'] = $category->id;
				} catch (Exception $e) {
					$data['errmsg'] = $e->getMessage();
				}
			}
		}
		$data['categories'] = $this->categorylib->loadAllCategories();
		$this->load->view('admin/category', $data);
	}

}
