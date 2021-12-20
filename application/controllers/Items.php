<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		//functionnya ada di fungsi_helper.php, kalau bingung disitu aja, ini fungsi nya biar gak bisa cek alamat user
		check_not_login();
		$this->load->model(['items_m','categories_m','units_m']);
	}

	public function index()
	{
		$data['row'] = $this->items_m->get();
		$this->template->load('template','products/items/items_data',$data);
	}

	function get_ajax() {
        $list = $this->items_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $items) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $items->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $items->name;
            $row[] = $items->categories_name;
            $row[] = $items->units_name;
            $row[] = indo_currency($items->price);
            $row[] = $items->stock;
            // add html for action
            $row[] = '<a href="'.site_url('items/edit/'.$items->items_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="'.site_url('items/del/'.$items->items_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->items_m->count_all(),
                    "recordsFiltered" => $this->items_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }


	public function add() 
	{
		$items = new stdClass();
		$items->items_id = null;
		$items->barcode = null;
		$items->name=null;
		$items->price = null;
		$items->categories_id =null;

		$query_categories = $this->categories_m->get();

		$query_units = $this->units_m->get();
		$units[null] = '- Pilih -';
		foreach($query_units->result() as $unt) {
			$units[$unt->units_id] = $unt->name;
		}

		$data = array(
			'page' => 'add',
			'row' => $items,
			'categories'=> $query_categories,
			'units' => $units, 'selectedunits' => null,
		);
		$this->template->load('template','products/items/items_form', $data);
	}

	public function edit($id)
	{
		$query = $this->items_m->get($id);
		if($query->num_rows() > 0) {
			$items = $query->row();
			$query_categories =$this->categories_m->get();

			$query_units = $this->units_m->get();
			$units[null] = '- Pilih -';
			foreach($query_units->result() as $unt) {
				$units[$unt->units_id] = $unt->name;
			}

			$data = array(
				'page' => 'edit',
				'row' => $items,
				'categories'=> $query_categories,
				'units' => $units, 'selectedunits' => $items->units_id,
			);
			$this->template->load('template','products/items/items_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('items')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->items_m->add($post);

		} else if(isset($_POST['edit'])) {
			$this->items_m->edit($post);
		}
	
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('items');
	}
	public function del($id)
	{
		$this->items_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('items');
	}
	function barcode_qrcode($id) {
		$data['row'] = $this->items_m->get($id)->row();
		$this->template->load('template','products/items/barcode_qrcode', $data);	
	}

	
}


