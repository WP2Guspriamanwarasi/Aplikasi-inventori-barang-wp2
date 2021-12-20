<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//functionnya ada di fungsi_helper.php, kalau bingung disitu aja, ini fungsi nya biar gak bisa cek alamat user
		check_not_login();
		$this->load->model('categories_m');
	}

	public function index()
	{
		$data['row'] = $this->categories_m->get();
		$this->template->load('template','products/categories/categories_data',$data);
	}

	public function add() 
	{
		$categories = new stdClass();
		$categories->categories_id = null;
		$categories->name=null;
		$data =array(
			'page' => 'add',
			'row' => $categories
		);
		$this->template->load('template','products/categories/categories_form', $data);

	}

	public function edit($id)
	{
		$query = $this->categories_m->get($id);
		if($query->num_rows() > 0) {
			$categories = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $categories
			);
			$this->template->load('template','products/categories/categories_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('categories')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->categories_m->add($post);

		} else if(isset($_POST['edit'])) {
			$this->categories_m->edit($post);
		}
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('categories');
	}
	public function del($id)
	{
		$this->categories_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('categories');
	}
}


