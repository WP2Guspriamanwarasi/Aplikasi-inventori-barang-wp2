<?php defined('BASEPATH') OR exit('No direct script access allowed');

class categories_m extends CI_Model {


public function get($id = null)
	{
		$this->db->from('p_categories');
		if($id != null) {
			$this->db->where('categories_id' , $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post)
	{
		$params = [
			'name' => $post['categories_name'],
		];
		$this->db->insert('p_categories', $params);
	}	
	public function edit($post)
	{
		$params = [
			'name' => $post['categories_name'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('categories_id', $post['id']);
		$this->db->update('p_categories', $params);
		
	}
	public function del($id)
	{
		$this->db->where('categories_id',$id);
		$this->db->delete('p_categories');
	}

}