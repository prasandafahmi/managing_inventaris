<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if ($this->uri->segment(4)=="success") $data{'success'}="";
		else $data{'success'}="display:none;";
		if ($this->uri->segment(2)=="error") $data{'error'}="";
		else $data{'error'}="display:none;";
		if ($this->uri->segment(4)=="edited") $data{'edited'}="";
		else $data{'edited'}="display:none;";
		if ($this->uri->segment(4)=="deleted") $data{'deleted'}="";
		else $data{'deleted'}="display:none;";
		$this->load->view('index', $data);
	}

	function success() {
		if ($this->uri->segment(4)=="success") $data{'success'}="";
		else $data{'success'}="display:none;";
		$this->load->view('index', $data);
	}

	function error() {
		if ($this->uri->segment(2)=="error") $data{'error'}="";
		else $data{'error'}="display:none;";
		$this->load->view('index', $data);
	}

	function main() {
		if ($this->uri->segment(4)=="success") $data{'success'}="";
		else $data{'success'}="display:none;";
		if ($this->uri->segment(2)=="error") $data{'error'}="";
		else $data{'error'}="display:none;";
		if ($this->uri->segment(4)=="edited") $data{'edited'}="";
		else $data{'edited'}="display:none;";
		if ($this->uri->segment(4)=="deleted") $data{'deleted'}="";
		else $data{'deleted'}="display:none;";
		$data['barang'] = $this->m_model->GetStok();

		$this->load->view('index',$data);
	}

	function print_item() {
		$this->load->view('pages/print');
	}

	function table_dynamic() {
		$this->load->view('test/table');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */