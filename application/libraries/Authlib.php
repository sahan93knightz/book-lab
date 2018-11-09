<?php

class AuthLib
{

	/**
	 * BookLib constructor.
	 */
	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function auth()
	{
		$userData = $this->ci->session->userdata();
		if (!isset($userData['logged_in'])) {
			$this->ci->load->helper('url');
			redirect('admin');
		}
	}
}
