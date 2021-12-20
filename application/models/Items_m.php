<?php defined('BASEPATH') OR exit('No direct script access allowed');

class items_m extends CI_Model {

	 // start datatables
    var $column_order = array(null, 'barcode', 'p_items.name', 'categories_name', 'units_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_items.name', 'price'); //set column field database for datatable searchable
    var $order = array('items_id' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('p_items.*, p_categories.name as categories_name, p_units.name as units_name');
        $this->db->from('p_item');
        $this->db->join('p_categories', 'p_item.categories_id = p_categories.categories_id');
        $this->db->join('p_units', 'p_items.units_id = p_units.units_id');
        $i = 0;
        foreach ($this->column_search as $items) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($items, $_POST['search']['value']);
                } else {
                    $this->db->or_like($items, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('p_items');
        return $this->db->count_all_results();
    }
    // end datatables


public function get($id = null)
	{
		$this->db->select('p_items.*, p_categories.name as categories_name, p_units.name as units_name');
		$this->db->from('p_items');
		$this->db->join('p_categories','p_categories.categories_id = p_items.categories_id
			');
		$this->db->join('p_units','p_units.units_id = p_items.units_id
			');
		if($id != null) {
			$this->db->where('items_id' , $id);
		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
	}


	public function add($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['product_name'],
			'categories_id' => $post['categories'],
			'units_id' => $post['units'],
			'price' => $post['price'],
		];
		$this->db->insert('p_items', $params);
	}	
	public function edit($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['product_name'],
			'categories_id' => $post['categories'],
			'units_id' => $post['units'],
			'price' => $post['price'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('items_id', $post['id']);
		$this->db->update('p_items', $params);
		
	}
	public function del($id)
	{
		$this->db->where('items_id', $id);
		$this->db->delete('p_items');
	}

	function update_stock_in($data)
	{
		$qty = $data['qty'];
		$id = $data['items_id'];
		$sql ="UPDATE p_items SET stock = stock + '$qty' WHERE items_id = '$id'";
		$this->db->query($sql);
	}

	function update_stock_out($data)
	{
		$qty = $data['qty'];
		$id = $data['items_id'];
		$sql ="UPDATE p_items SET stock = stock - '$qty' WHERE items_id = '$id'";
		$this->db->query($sql);
	}

}