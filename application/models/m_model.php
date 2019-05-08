<?php

/**
* 
*/
class M_model extends CI_Model
{
	
	function cekLogin($username, $password) {
		$query = $this->db->get_where("account", array("employee_code"=>$username, "password"=>$password));
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function Save() {
		$save_data = array(
				'item_name'		=> $this->input->post('item_name'),
				'total'		=> $this->input->post('total'),
				'position'			=> $this->input->post('position'),
				'supplier'			=> $this->input->post('supplier')
			);

		$this->db->set('time', 'NOW()', FALSE);
		$save = $this->db->insert('item_list', $save_data);
		return $save;
	}

	function Mines() {
		$save_data = array(
				'id_item'		=> $this->input->post('id_item'),
				'total_out'		=> $this->input->post('total_out'),
				'position'			=> $this->input->post('position'),
				'item_name'			=> $this->input->post('item_name'),
				'supplier'			=> $this->input->post('supplier')
			);

		$this->db->set('time', 'NOW()', FALSE);
		$save = $this->db->insert('item_out', $save_data);
		return $save;
	}

	function GetStok() {
		$config['base_url']=site_url('home/main/list-item/');
		$this->db->order_by('id_item', "DESC");
		$config['total_rows']=$this->db->get('item_list')->num_rows();
		$config['per_page']=10;
		$config['num_links']=10;
		$config['next_link']='<span style="border:solid 1px #ccc;padding:5px 10px;">Next</span>';
		$config['prev_link']='<span style="border:solid 1px #ccc;padding:5px 10px;">Prev</span>';
		$config['last_link']='<span>Last</span>';
		$config['full_tag_open']='<span style="border:solid 1px #ccc;padding:5px 0px;">';
		$config['full_tag_close']='</span>';
		$config['uri_segment']=4;

		$this->pagination->initialize($config);
		$this->db->order_by('id_item', "DESC");
		$barang[0]=$this->db->get('item_list', $config['per_page'],$this->uri->segment(4));

		///
		$noperang=array();
		$no_rang=0;
		$nolanjut=0;
		foreach($barang[0]->result_array() as $val)
		{
		if(!$this->uri->segment(3)) //jika page belum berjalan
		{
		$no_rang++;
		}
		else
		{
		$nolanjut++;
		if($nolanjut>1)
		{
		$no_rang=$nolanjut+$config['per_page']*($this->uri->segment(4)/$config['per_page']);
		}
		else
		{
		$no_rang=$this->uri->segment(4)+1;
		}
		}
		$noperang[]=$no_rang;
		}

		$barang[1]=$this->pagination->create_links();
		$barang[2]=$noperang;
		return $barang;
	}

	public function delete_banyak($id) {
		$delete = $this->db->query("DELETE FROM item_list WHERE id_item='$id'");
        return $delete;
	}

	function delete_out($id) {
		$delete = $this->db->query("DELETE FROM item_out WHERE id_out='$id'");
		return $delete;
	}
}