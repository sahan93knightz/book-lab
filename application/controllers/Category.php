<?php
/**
 * Created by IntelliJ IDEA.
 * User: sahan
 * Date: 11/3/18
 * Time: 3:18 PM
 */

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('clientlib');
		$this->load->library('pagination');
	}


	public function productLookupById($categoryId)
	{

		$booksCount = $this->booklib->countBooksByCategory($categoryId);
		$config['base_url'] = base_url() . '/category/' . $categoryId;
		$config['total_rows'] = $booksCount;
		$config['per_page'] = 6;
		$config["uri_segment"] = 3;

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_close'] = '</li>';


		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';


		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$books = $this->booklib->loadBooksByCategory($categoryId, $page, $config['per_page']);
		$category = $this->categorylib->getCategory($categoryId);
		$this->data['books'] = $books;
		$this->data['books_count'] = $booksCount;
		$this->data['selectedCategory'] = $category;
		$this->data['pagination_links'] = $this->pagination->create_links();

//		echo 'Page:' . $page . '<br>';
//		echo 'Category Id:' . $categoryId . '<br>';
//		var_dump($books);
		$this->load->view('category_list', $this->data);
	}
}
