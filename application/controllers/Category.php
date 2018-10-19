<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('categorylib');
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
		$this->load->view('admin/create_category', $data);
	}

}
