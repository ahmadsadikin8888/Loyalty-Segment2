<?php
require APPPATH . 'controllers/sistem/General_title.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaction_point_new_config {
	


   function __construct(){
	   /* title */
	    $this->general		= new General_title();
		$this->transaction_point_new_id	= 'ID';
		$this->transaction_point_new_title_point	= 'TITLE_POINT';
		$this->transaction_point_new_realname	= 'REALNAME';
		$this->transaction_point_new_trx_id	= 'TRX_ID';
		$this->transaction_point_new_invoice	= 'INVOICE';
		$this->transaction_point_new_ncli	= 'NCLI';
		$this->transaction_point_new_admin_id	= 'ADMIN_ID';
		$this->transaction_point_new_merchant_id	= 'MERCHANT_ID';
		$this->transaction_point_new_redeem_key	= 'REDEEM_KEY';
		$this->transaction_point_new_point_id	= 'POINT_ID';
		$this->transaction_point_new_price	= 'PRICE';
		$this->transaction_point_new_status	= 'STATUS';
		$this->transaction_point_new_create_time	= 'CREATE_TIME';
		$this->transaction_point_new_update_time	= 'UPDATE_TIME';
		$this->transaction_point_new_expired_time	= 'EXPIRED_TIME';
		$this->transaction_point_new_used_time	= 'USED_TIME';
		$this->transaction_point_new_used_merchant	= 'USED_MERCHANT';
		$this->transaction_point_new_kode_merchant	= 'KODE_MERCHANT';
		$this->transaction_point_new_used_status	= 'USED_STATUS';
		$this->transaction_point_new_msisdn	= 'MSISDN';
		$this->transaction_point_new_email	= 'EMAIL';
		$this->transaction_point_new_nd	= 'ND';
		$this->transaction_point_new_use_otp	= 'USE_OTP';
		$this->transaction_point_new_product_code	= 'PRODUCT_CODE';
		$this->transaction_point_new_product_type	= 'PRODUCT_TYPE';
		$this->transaction_point_new_product_price	= 'PRODUCT_PRICE';
		$this->transaction_point_new_slcs_data_response	= 'SLCS_DATA_RESPONSE';
		$this->transaction_point_new_slcs_update_time	= 'SLCS_UPDATE_TIME';
		$this->transaction_point_new_use_exp	= 'USE_EXP';

		
		
		
		/*field_alias_database db*/
		$this->f_id	= 'id';
		$this->f_title_point	= 'title_point';
		$this->f_realname	= 'realname';
		$this->f_trx_id	= 'trx_id';
		$this->f_invoice	= 'invoice';
		$this->f_ncli	= 'ncli';
		$this->f_admin_id	= 'admin_id';
		$this->f_merchant_id	= 'merchant_id';
		$this->f_redeem_key	= 'redeem_key';
		$this->f_point_id	= 'point_id';
		$this->f_price	= 'price';
		$this->f_status	= 'status';
		$this->f_create_time	= 'create_time';
		$this->f_update_time	= 'update_time';
		$this->f_expired_time	= 'expired_time';
		$this->f_used_time	= 'used_time';
		$this->f_used_merchant	= 'used_merchant';
		$this->f_kode_merchant	= 'kode_merchant';
		$this->f_used_status	= 'used_status';
		$this->f_msisdn	= 'msisdn';
		$this->f_email	= 'email';
		$this->f_nd	= 'nd';
		$this->f_use_otp	= 'use_otp';
		$this->f_product_code	= 'product_code';
		$this->f_product_type	= 'product_type';
		$this->f_product_price	= 'product_price';
		$this->f_slcs_data_response	= 'slcs_data_response';
		$this->f_slcs_update_time	= 'slcs_update_time';
		$this->f_use_exp	= 'use_exp';

		
		
		
		/* CONFIG FORM LIST */
		/* field_alias_database => $title */	
		$this->table_column =array(
			$this->f_id	=> $this->transaction_point_new_id,
			$this->f_title_point	=> $this->transaction_point_new_title_point,
			$this->f_realname	=> $this->transaction_point_new_realname,
			$this->f_trx_id	=> $this->transaction_point_new_trx_id,
			$this->f_invoice	=> $this->transaction_point_new_invoice,
			$this->f_ncli	=> $this->transaction_point_new_ncli,
			$this->f_admin_id	=> $this->transaction_point_new_admin_id,
			$this->f_merchant_id	=> $this->transaction_point_new_merchant_id,
			$this->f_redeem_key	=> $this->transaction_point_new_redeem_key,
			$this->f_point_id	=> $this->transaction_point_new_point_id,
			$this->f_price	=> $this->transaction_point_new_price,
			$this->f_status	=> $this->transaction_point_new_status,
			$this->f_create_time	=> $this->transaction_point_new_create_time,
			$this->f_update_time	=> $this->transaction_point_new_update_time,
			$this->f_expired_time	=> $this->transaction_point_new_expired_time,
			$this->f_used_time	=> $this->transaction_point_new_used_time,
			$this->f_used_merchant	=> $this->transaction_point_new_used_merchant,
			$this->f_kode_merchant	=> $this->transaction_point_new_kode_merchant,
			$this->f_used_status	=> $this->transaction_point_new_used_status,
			$this->f_msisdn	=> $this->transaction_point_new_msisdn,
			$this->f_email	=> $this->transaction_point_new_email,
			$this->f_nd	=> $this->transaction_point_new_nd,
			$this->f_use_otp	=> $this->transaction_point_new_use_otp,
			$this->f_product_code	=> $this->transaction_point_new_product_code,
			$this->f_product_type	=> $this->transaction_point_new_product_type,
			$this->f_product_price	=> $this->transaction_point_new_product_price,
			$this->f_slcs_data_response	=> $this->transaction_point_new_slcs_data_response,
			$this->f_slcs_update_time	=> $this->transaction_point_new_slcs_update_time,
			$this->f_use_exp	=> $this->transaction_point_new_use_exp,
		);

	}

};









/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-03-17 00:11:14 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

