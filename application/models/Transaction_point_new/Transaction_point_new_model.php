<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_point_new_model extends CI_Model {
   public $id;	
   function __construct(){
        parent::__construct();
		$this->db = $this->load->database('indipass',TRUE);
   }	
	
	public function json(){
		$this->datatables->select('
			transaction_point_new.id as id,
			transaction_point_new.title_point as title_point,
			transaction_point_new.realname as realname,
			transaction_point_new.trx_id as trx_id,
			transaction_point_new.invoice as invoice,
			transaction_point_new.ncli as ncli,
			transaction_point_new.admin_id as admin_id,
			transaction_point_new.merchant_id as merchant_id,
			transaction_point_new.redeem_key as redeem_key,
			transaction_point_new.point_id as point_id,
			transaction_point_new.price as price,
			transaction_point_new.status as status,
			transaction_point_new.create_time as create_time,
			transaction_point_new.update_time as update_time,
			transaction_point_new.expired_time as expired_time,
			transaction_point_new.used_time as used_time,
			transaction_point_new.used_merchant as used_merchant,
			transaction_point_new.kode_merchant as kode_merchant,
			transaction_point_new.used_status as used_status,
			transaction_point_new.msisdn as msisdn,
			transaction_point_new.email as email,
			transaction_point_new.nd as nd,
			transaction_point_new.use_otp as use_otp,
			transaction_point_new.product_code as product_code,
			transaction_point_new.product_type as product_type,
			transaction_point_new.product_price as product_price,
			transaction_point_new.slcs_data_response as slcs_data_response,
			transaction_point_new.slcs_update_time as slcs_update_time,
			transaction_point_new.use_exp as use_exp,
		');
		
		$this->datatables->from('transaction_point_new');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'transaction_point_new.id as id',
			'transaction_point_new.title_point as title_point',
			'transaction_point_new.realname as realname',
			'transaction_point_new.trx_id as trx_id',
			'transaction_point_new.invoice as invoice',
			'transaction_point_new.ncli as ncli',
			'transaction_point_new.admin_id as admin_id',
			'transaction_point_new.merchant_id as merchant_id',
			'transaction_point_new.redeem_key as redeem_key',
			'transaction_point_new.point_id as point_id',
			'transaction_point_new.price as price',
			'transaction_point_new.status as status',
			'transaction_point_new.create_time as create_time',
			'transaction_point_new.update_time as update_time',
			'transaction_point_new.expired_time as expired_time',
			'transaction_point_new.used_time as used_time',
			'transaction_point_new.used_merchant as used_merchant',
			'transaction_point_new.kode_merchant as kode_merchant',
			'transaction_point_new.used_status as used_status',
			'transaction_point_new.msisdn as msisdn',
			'transaction_point_new.email as email',
			'transaction_point_new.nd as nd',
			'transaction_point_new.use_otp as use_otp',
			'transaction_point_new.product_code as product_code',
			'transaction_point_new.product_type as product_type',
			'transaction_point_new.product_price as product_price',
			'transaction_point_new.slcs_data_response as slcs_data_response',
			'transaction_point_new.slcs_update_time as slcs_update_time',
			'transaction_point_new.use_exp as use_exp',
		
		);
		$this->db->select($afield);

		$this->db->order_by('transaction_point_new.id', 'ASC');
		return $this->db->get('transaction_point_new')->result_array();
   }


	public function get_by_id($id){
		$afield = array(
			'transaction_point_new.id as id',
			'transaction_point_new.title_point as title_point',
			'transaction_point_new.realname as realname',
			'transaction_point_new.trx_id as trx_id',
			'transaction_point_new.invoice as invoice',
			'transaction_point_new.ncli as ncli',
			'transaction_point_new.admin_id as admin_id',
			'transaction_point_new.merchant_id as merchant_id',
			'transaction_point_new.redeem_key as redeem_key',
			'transaction_point_new.point_id as point_id',
			'transaction_point_new.price as price',
			'transaction_point_new.status as status',
			'transaction_point_new.create_time as create_time',
			'transaction_point_new.update_time as update_time',
			'transaction_point_new.expired_time as expired_time',
			'transaction_point_new.used_time as used_time',
			'transaction_point_new.used_merchant as used_merchant',
			'transaction_point_new.kode_merchant as kode_merchant',
			'transaction_point_new.used_status as used_status',
			'transaction_point_new.msisdn as msisdn',
			'transaction_point_new.email as email',
			'transaction_point_new.nd as nd',
			'transaction_point_new.use_otp as use_otp',
			'transaction_point_new.product_code as product_code',
			'transaction_point_new.product_type as product_type',
			'transaction_point_new.product_price as product_price',
			'transaction_point_new.slcs_data_response as slcs_data_response',
			'transaction_point_new.slcs_update_time as slcs_update_time',
			'transaction_point_new.use_exp as use_exp',
		
		);
		$this->db->select($afield);

		$this->db->where('transaction_point_new.id', $id);
		$this->db->order_by('transaction_point_new.id', 'ASC');
		return $this->db->get('transaction_point_new')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('transaction_point_new.id <>',$id);

		$q = $this->db->get_where('transaction_point_new', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('transaction_point_new', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('transaction_point_new.id', $id);
		$this->db->update('transaction_point_new', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('transaction_point_new.id',$data);	
	
			$this->db->delete('transaction_point_new');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-03-17 00:11:14 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
