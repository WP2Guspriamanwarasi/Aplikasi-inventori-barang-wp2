<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('t_stock');
        if($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;   
    }
    
    public function del($id)
    {
        $this->db->where('stock_in', $id);
        $this->db->delete('t_stock');

        $this->db->where('stock_out', $id);
        $this->db->delete('t_stock');
    }


    // public function del($id)
    // {
    //     $this->db->where('stock_out', $id);
    //     $this->db->delete('t_stock');
    // }




    public function get_stock_in()
    {
        $this->db->select('t_stock.stock_id, p_items.barcode,
        p_items.name as items_name, qty, date,
        supplier.name as supplier_name, p_items.items_id');
        $this->db->from('t_stock');
        $this->db->join('p_items', 't_stock.items_id = p_items.items_id');
        $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    
    public function add_stock_in($post)
    {
        $params = [
            'items_id' => $post['items_id'],
            'type' => 'in',
            'supplier_id' => $post['supplier'] =='' ? null : $post['supplier'],
            'qty' =>$post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock', $params);
    }
    

    public function get_stock_out()
    {
        $this->db->select('t_stock.stock_id, p_items.barcode,
        p_items.name as items_name, qty, date, detail,
        p_items.items_id');
        $this->db->from('t_stock');
        $this->db->join('p_items', 't_stock.items_id = p_items.items_id');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $params = [
            'items_id' => $post['items_id'],
            'type' => 'out',
            'qty' =>$post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock', $params);
    }
}