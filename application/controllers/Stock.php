<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['items_m','supplier_m','stock_m']);
    }

    public function stock_in_data() 
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data',$data);
    }

    public function stock_in_add() 
    {
        $items = $this->items_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['items' => $items, 'supplier' => $supplier];
        $this->template->load('template','transaction/stock_in/stock_in_form',$data);
    }


    public function process_in() 
    {
        if(isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->items_m->update_stock_in($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data Stock-in berhasil disimpan');
            }
            redirect('stock/in');
        }
    }
            

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $items_id =$this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data= ['qty' => $qty, 'items_id' => $items_id];
        $this->items_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-in Berhasil dihapus');
        }
        redirect('stock/in');
    }


    public function stock_out_data() 
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data',$data);
    }

    public function stock_out_add() 
    {
        $items = $this->items_m->get()->result();
        $data = ['items' => $items];
        $this->template->load('template','transaction/stock_out/stock_out_form',$data);
    }

    public function process_out() {
        if(isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->items_m->update_stock_out($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Data Stock-out berhasil disimpan');
            }
            redirect('stock/out');
        }
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $items_id =$this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data= ['qty' => $qty, 'items_id' => $items_id];
        $this->items_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-out Berhasil dihapus');
        }
        redirect('stock/out');
    }
}