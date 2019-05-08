<?php

/**
* 
*/
class Action extends CI_Controller
{
	
	function login() {
		$username = $this->input->post("employee_code");
		$password = $this->input->post("password");
		
		$query = $this->m_model->cekLogin($username, $password);
		if ($query) {
			foreach ($query as $key => $value) {
				$userdata = array(	'name' => $value->name,
									'avatar' => $value->image,
									'permission' => $value->permission,
									'id_account' => $value->id_account);
				$this->session->set_userdata($userdata);
			}
			redirect('home');
		}
		else
		{
			redirect('home/error');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}

	function save() {
		$this->load->library('form_validation');
		$this->m_model->Save();
		redirect('home/main/new-item/success');
	}

	function save_edit() {
		$id=$this->input->post("id");

		$e['item_name'] = $this->input->post('item_name');
		$e['total'] = $this->input->post('total');
		$e['supplier'] = $this->input->post('supplier');
		$e['position'] = $this->input->post('position');

		$update = $this->db->query("UPDATE item_list SET
									item_name = '$e[item_name]',
									total = '$e[total]',
									supplier = '$e[supplier]',
									position = '$e[position]'
								WHERE id_item='$id'");
		if($update) {
			redirect('home/main/list-item/edited');
		}
		else {
			redirect('home/main/list-item/failed_to_save');
		}
	}

	function mines_action() {
		$this->load->library('form_validation');
		$this->m_model->Mines();
		redirect('home/main/item-out/success');
	}

	function delete() {
		$id = $this->uri->segment(3);
		$data = $this->db->delete("item_list",array("id_item"=>"$id"));
		if ($data) {
			redirect('home/main/list-item/deleted');
        }
		else{
			echo "Gagal menghapus data yang dipilih !";
		}
	}

	function delete_out() {
		$id = $this->uri->segment(3);
		$data = $this->db->delete("item_out",array("id_out"=>"$id"));
		if ($data) {
			redirect('home/main/item-out/deleted');
        }
		else{
			echo "Gagal menghapus data yang dipilih !";
		}
	}

	function multidelete_item() {
		$id = $this->input->post("item");
		for ($i=0;$i<sizeof($id);$i++)
        {
            print_r($id[$i]);
            $this->m_model->delete_banyak($id[$i]);
            redirect('home/main/list-item/deleted');
        }
        echo "<script>
        alert('Silahkan refresh laman untuk melihat hasil !')
        javascript:history.go(-1);
        </script>
        ";
	}

	function multidelete_out() {
		$id = $this->input->post("out");
		for ($i=0;$i<sizeof($id);$i++)
        {
            print_r($id[$i]);
            $this->m_model->delete_out($id[$i]);
            redirect('home/main/item-out/deleted');
        }
        echo "<script>
        alert('Silahkan refresh laman untuk melihat hasil !')
        javascript:history.go(-1);
        </script>
        ";
	}

	function edit_account() {
		$id=$this->input->post("id");

		$e['name'] = $this->input->post('name');
		$e['employee_code'] = $this->input->post('employee_code');
		$e['password'] = $this->input->post('password');
		$e['permission'] = $this->input->post('permission');

		$update = $this->db->query("UPDATE account SET
									name = '$e[name]',
									employee_code = '$e[employee_code]',
									password = '$e[password]',
									permission = '$e[permission]'
								WHERE id_account='$id'");
		if($update) {
			redirect('home');
		}
		else {
			redirect('home');
		}
	}

	function export()
	{
		$this->load->helper('to_excel');
    	$query = $this->db->query("SELECT * FROM item_list");
    	foreach ($query->result() as $key => $value) {
    		$nama = "Data barang masuk";
    	}
    	to_excel($query, $nama);
	}

	function export_out() {
		$this->load->helper('to_excel');
		$query = $this->db->query("SELECT * FROM item_out");
		foreach ($query->result() as $key => $value) {
			$nama = "Data barang keluar";
		}
		to_excel($query, $nama);
	}
}
