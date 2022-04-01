<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Donation_model extends Admin_model
{
	public $table = "donation d";
	public $select_column = ['d.id', 'd.name', 'd.mobile', 'd.email', 'd.amount', 'd.payment_id'];
	public $search_column = ['d.id', 'd.name', 'd.mobile', 'd.email', 'd.amount', 'd.payment_id'];
    public $order_column = [null, 'd.id', 'd.name', 'd.mobile', 'd.email', 'd.amount', 'd.payment_id'];
	public $order = ['d.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table);

        foreach ($this->search_column as $i => $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->search_column) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

	public function count()
	{
		return $this->db->select('d.id')
		            	 ->from($this->table)
		            	 ->get()
						 ->num_rows();
	}
}