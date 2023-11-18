<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Auction_model extends CI_Model {

		private $url = array(
			'table_name'=> 'auction',
		);
	
		public function __construct()
		{
			parent::__construct();
			//Load Dependencies

	
		}
	
		public function load_all_auction_product(){
			$this->db->select('products.*,auction.*,auction.id as auction_id');
			$this->db->join('products','products.id ='. $this->url['table_name'].'.product_id','INNER');
			return $this->db->get($this->url['table_name'])->result();
		}

		public function load_all_auction_vendor_product($user_id){
			$this->db->select('products.*,auction.*,auction.id as auction_id');
			$this->db->join('products','products.id ='. $this->url['table_name'].'.product_id','INNER');
			$this->db->where('products.user_id', $user_id);
			return $this->db->get($this->url['table_name'])->result();
		}

		public function bid_users_list($auction_id=''){
			return  $this->db->select('*')
	        ->join('users as u', 'b.user_id = u.id','INNER')
	        ->order_by('bid_id','desc')
	        ->get_where('bid as b',array('b.auction_id'=>$auction_id))->result();
		}

		public function e_auction_list(){
         return $this->db->select("e.*,p.*, p.id as product_id,e.id as eauction_id")
            ->from('eauction as e')
            ->join('products as p', 'e.product_id = p.id','INNER')
            ->get()->result();

    	}

	}
	

	
?>