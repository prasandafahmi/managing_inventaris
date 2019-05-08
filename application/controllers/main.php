<?php

/**
* 
*/
class Main extends CI_Controller
{
	
	function index() {
		$data['item'] = $this->m_model->item_list();
		$this->load->view('index', $data);
	}
}