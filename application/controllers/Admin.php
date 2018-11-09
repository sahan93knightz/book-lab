<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
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
		$data = array();
		if ($this->input->method() == 'post') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($username == 'admin' && $password == 'admin') {
				$newdata = array(
					'username' => 'admin',
					'email' => 'admin@booklab.com',
					'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				redirect('admin/category');
			} else {
				$data['error'] = 'Invalid Username or Password';
			}
		} else {
			$userData = $this->session->userdata();
			if (isset($userData['logged_in'])) {
				redirect('admin/category');
			} else {
				$this->load->view('admin/login', $data);
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

}
