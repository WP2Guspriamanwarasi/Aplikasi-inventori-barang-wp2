<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//functionnya ada di fungsi_helper.php, kalau bingung disitu aja, ini fungsi nya biar gak bisa cek alamat user
		check_not_login();
		$this->load->model('units_m');
	}

	public function index()
	{
		$data['row'] = $this->units_m->get();
		$this->template->load('template','products/units/units_data',$data);
	}

	public function add() 
	{
		$units = new stdClass();
		$units->units_id = null;
		$units->name=null;
		$data =array(
			'page' => 'add',
			'row' => $units
		);
		$this->template->load('template','products/units/units_form', $data);

	}

	public function edit($id)
	{
		$query = $this->units_m->get($id);
		if($query->num_rows() > 0) {
			$units = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $units
			);
			$this->template->load('template','products/units/units_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('units')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->units_m->add($post);

		} else if(isset($_POST['edit'])) {
			$this->units_m->edit($post);
		}
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('units');
	}
	public function del($id)
	{
		$this->units_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('units');
	}
}


