<?php
require APPPATH . '/controllers/Report/Report_config.php';

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Report extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();
		;
		$this->title = new Report_config();
		$this->load->model('Custom_model/Admin_model', 'admin_model');
		$this->load->model('Custom_model/Transaction_point_new_model', 'transaction_point');
	}




	////render by ajax
	public function index()
	{
		$data = array(
			'title_page_big'		=> 'Report Transaction Point',
			'title'					=> $this->title,
		);
		$data['controller']=$this;
		if (isset($_GET['start']) && isset($_GET['end'])) {
			$start_filter = $_GET['start'];
			$end_filter = $_GET['end'];
			$data['total']['trx']=$this->transaction_point->get_count(array('DATE(used_time) >='=>$start_filter,'DATE(used_time) <='=>$end_filter,'use_exp'=>0));
			$data['total']['burn']=$this->transaction_point->get_sum(array('DATE(used_time) >='=>$start_filter,'DATE(used_time) <='=>$end_filter,'use_exp'=>0),'price');
			$data['data']['trx']=$this->get_transaction($start_filter,$end_filter);
			$data['data']['merchant']=$this->get_merchant_sum($start_filter,$end_filter);
		}
		
		$this->template->load('Report/general', $data);
	}
	public function reprot_merchant()
	{
		$data = array(
			'title_page_big'		=> 'Report Transaction Merchant',
			'title'					=> $this->title,
		);
		$data['controller']=$this;
		if (isset($_GET['start']) && isset($_GET['end'])) {
			$start_filter = $_GET['start'];
			$end_filter = $_GET['end'];
			$data['data']['merchant']=$this->get_merchant($start_filter,$end_filter);
			
		}
		$data['filter_merchant']="";
		$data['filter_category']="";
		if(isset($_GET['category']) && $_GET['category'] != "all"){
			$category=$_GET['category'];
			$data['filter_category']=$category;
		}
		if(isset($_GET['point_id']) && $_GET['point_id'] != "all"){
			$point_id=$_GET['point_id'];
			$data['filter_merchant']=$point_id;

		}
		$data['list_category']=$this->transaction_point->live_query("SELECT * FROM m_category")->result();
		$data['list_merchant']=$this->transaction_point->live_query("SELECT * FROM point")->result();
		$this->template->load('Report/merchant', $data);
	}
	public function get_transaction($start_filter,$end_filter){
		$query=$this->transaction_point->live_query("SELECT DISTINCT t.trx_id, t.id, t.title_point,t.realname,t.ncli,t.admin_id,t.merchant_id,t.redeem_key,t.point_id,t.price,t.`status`,t.create_time,t.kode_merchant,t.used_merchant,t.expired_time,t.used_time,
		REPLACE(ncli.NAMA_PIC,'''','') PIC,ncli.EMAIL_PIC,ncli.HP_PIC,ncli.NO_TELEPON,t.msisdn,t.email,t.nd, NAMA_PEMILIK, 
		(select WITEL from m_witel where m_witel.NCLI=t.ncli limit 1 ) WITEL 
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' ");
		$result=$query->result();
		$data['result']=$result;

		$query=$this->transaction_point->live_query("SELECT t.ncli
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		GROUP BY
		t.ncli
		");
		$result=$query->result();
		$data['uniq_redeem']=count($result);
		return $data;
	}	
	public function get_merchant($start_filter,$end_filter){
		$filter_category="";
		$filter_point="";
		$data['filter_merchant']="";
		$data['filter_category']="";
		if(isset($_GET['category']) && $_GET['category'] != "all"){
			$category=$_GET['category'];
			$filter_category=" AND c.category_id ='$category'";
			$data['filter_category']=$category;
		}
		if(isset($_GET['point_id']) && $_GET['point_id'] != "all"){
			$point_id=$_GET['point_id'];
			$filter_point=" AND t.point_id ='$point_id'";
			$data['filter_merchant']=$point_id;
		}
		$query=$this->transaction_point->live_query("SELECT t.title_point,c.category_name,count(t.id) as id_num,SUM(t.price) as price_sum,COUNT(DISTINCT(t.ncli)) as uniq_user
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		$filter_category
		$filter_point
		GROUP BY
		t.title_point
		");
		$result=$query->result();
		$data['result']=$result;

		$query=$this->transaction_point->live_query("SELECT count(t.id) as id_num,SUM(t.price) as price_sum,COUNT(DISTINCT(t.ncli)) as uniq_user
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		$filter_category
		$filter_point
		");
		$result=$query->result();
		$data['summary']=$result;
		$query=$this->transaction_point->live_query("SELECT DISTINCT t.trx_id, t.id, t.title_point,t.realname,t.ncli,t.admin_id,t.merchant_id,t.redeem_key,t.point_id,t.price,t.`status`,t.create_time,t.kode_merchant,t.used_merchant,t.expired_time,t.used_time,
		REPLACE(ncli.NAMA_PIC,'''','') PIC,ncli.EMAIL_PIC,ncli.HP_PIC,ncli.NO_TELEPON,t.msisdn,t.email,t.nd, NAMA_PEMILIK, 
		(select WITEL from m_witel where m_witel.NCLI=t.ncli limit 1 ) WITEL 
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		$filter_category
		$filter_point
		");
		$result=$query->result();
		$data['trx']=$result;
		return $data;
	}	
	public function get_merchant_sum($start_filter,$end_filter){
		$filter_category="";
		$filter_point="";
		$data['filter_merchant']="";
		$data['filter_category']="";
		if(isset($_GET['category']) && $_GET['category'] != "all"){
			$category=$_GET['category'];
			$filter_category=" AND c.category_id ='$category'";
			$data['filter_category']=$category;
		}
		if(isset($_GET['point_id']) && $_GET['point_id'] != "all"){
			$point_id=$_GET['point_id'];
			$filter_point=" AND t.point_id ='$point_id'";
			$data['filter_merchant']=$point_id;

		}
		$query=$this->transaction_point->live_query("SELECT t.title_point
		FROM transaction_point_new t
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		GROUP BY
		t.title_point
		");
		$result=$query->result();
		$data['result']=$result;

		return $data;
	}	
	public function decrypt($encryptedText, $key) {
        $secretKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        mcrypt_generic_init($openMode, $secretKey, $initVector);
        $decryptedText = mdecrypt_generic($openMode, $encryptedText);
        $decryptedText = rtrim($decryptedText, "\0");
        mcrypt_generic_deinit($openMode);
        return $decryptedText;
    }
	public function hextobin($hexString) {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }

            $count += 2;
        }
        return $binString;
    }
	public function pkcs5_pad($plainText, $blockSize) {
        $pad = $blockSize - (strlen($plainText) % $blockSize);
        return $plainText . str_repeat(chr($pad), $pad);
    }


};
