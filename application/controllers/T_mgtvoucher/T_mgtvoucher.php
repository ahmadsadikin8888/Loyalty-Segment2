<?php
require APPPATH . '/controllers/T_mgtvoucher/T_mgtvoucher_config.php';

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_mgtvoucher extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();
		$this->load->model('T_mgtvoucher/T_mgtvoucher_model', 'tmodel');
		$this->log_key = 'log_T_mgtvoucher';
		$this->load->library('upload');
		$this->title = new T_mgtvoucher_config();
	}


	public function index()
	{
		$data = array(
			'title_page_big'		=> 'DAFTAR',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url() . 'T_mgtvoucher/T_mgtvoucher/refresh_table/' . $this->_token,
			'link_create'			=> site_url() . 'T_mgtvoucher/T_mgtvoucher/create',
			'link_update'			=> site_url() . 'T_mgtvoucher/T_mgtvoucher/update',
			'link_delete'			=> site_url() . 'T_mgtvoucher/T_mgtvoucher/delete_multiple',
		);
		// $idlogin = $this->session->userdata('idlogin');
		// $logindata = $this->log_login->get_by_id($idlogin);
		// $userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		// $data['userdata'] = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data['list_outbound'] = $this->db->query("SELECT * FROM t_mgtvoucher")->result();
		$data['ctrl'] = $this;
		$this->template->load('T_mgtvoucher/T_mgtvoucher_list', $data);
	}

	public function refresh_table($token)
	{
		if ($token == $this->_token) {
			$row = $this->tmodel->json();

			//encode id 
			$tm = time();
			$this->session->set_userdata($this->log_key, $tm);
			$x = 0;
			foreach ($row['data'] as $val) {
				$idgenerate = _encode_id($val['id'], $tm);
				$row['data'][$x]['id'] = $idgenerate;
				$x++;
			}

			$o = new Outputview();
			$o->success	= 'true';
			$o->serverside	= 'true';
			$o->message	= $row;

			echo $o->result();
		} else {
			redirect('Auth');
		}
	}

	public function create()
	{
		$data = array(
			'title_page_big'		=> 'Buat Baru',
			'title'					=> $this->title,
			'link_save'				=> site_url() . 'T_mgtvoucher/T_mgtvoucher/create_action',
			'link_back'				=> $this->agent->referrer(),
		);
		$data['list_agent_d'] = $this->db->query("SELECT * FROM t_channel_payment");

		$this->template->load('T_mgtvoucher/T_mgtvoucher_form', $data);
	}
	public function insertdata()
	{
		$channel_payment = implode(',', $_POST['channel_payment']);
		$jenis_pembayaran = implode(',', $_POST['jenis_pembayaran']);

		// get foto
		$tm = time();
		$config['upload_path'] = 'assets/voucher/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '1024';  //1MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name']			=  $_POST['nama_voucher'] . '_' . $tm . '.jpg';
		$this->upload->initialize($config);

		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload('image')) {
				$data = array(
					'nama_voucher' => $config['file_name'],
					'channel_payment' => $channel_payment,
					'jenis_pembayaran' => $jenis_pembayaran,
					'jenis_cashback' => $_POST['jenis_cashback'],
					'percent_cashback' => $_POST['jenis_cashback'],
					'nominal_cashback' => '',
					'max_nominal' => '',
					'start_datelive' => '',
					'end_datelive' => '',
					'wording' => '',
					'image' => '',
					'kode_voucher' => ''
				);
				$this->db->insert('t_mgtvoucher', $data);
				redirect('T_mgtvoucher/T_mgtvoucher');
			} else {
				die("gagal upload");
			}
		} else {
			echo "tidak masuk";
		}
	}

	public function create_action()
	{
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);
		$o		= new Outputview();

		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/

		//mencegah data kosong
		if (!$o->not_empty($val['nama_voucher'], '#nama_voucher')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('nama_voucher' => $val['nama_voucher']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#nama_voucher')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['channel_payment'], '#channel_payment')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('channel_payment' => $val['channel_payment']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#channel_payment')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['jenis_pembayaran'], '#jenis_pembayaran')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('jenis_pembayaran' => $val['jenis_pembayaran']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#jenis_pembayaran')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['jenis_cashback'], '#jenis_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('jenis_cashback' => $val['jenis_cashback']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#jenis_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['percent_cashback'], '#percent_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('percent_cashback' => $val['percent_cashback']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#percent_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['nominal_cashback'], '#nominal_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('nominal_cashback' => $val['nominal_cashback']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#nominal_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['start_datelive'], '#start_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('start_datelive' => $val['start_datelive']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#start_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['end_datelive'], '#end_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('end_datelive' => $val['end_datelive']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#end_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['wording'], '#wording')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('wording' => $val['wording']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#wording')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['image'], '#image')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('image' => $val['image']);
		$exist = $this->tmodel->if_exist('', $field);
		if (!$o->not_exist($exist, '#image')) {
			echo $o->result();
			return;
		}

		unset($val['id']);
		$success = $this->tmodel->insert($val);
		echo $o->auto_result($success);
	}

	public function update($id)
	{
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;

		/** proses decode id 
		 * important !! tempdata digunakan sbagai antisipasi
		 * perubahan session saat membuka tab baru secara bersamaan
		 **/
		$this->log_temp	= $this->session->userdata($this->log_key);
		$this->session->set_tempdata($id, $this->log_temp, 300);

		//mengembalikan id asli
		$id = _decode_id($id, $this->log_temp);

		$row = $this->tmodel->get_by_id($id);

		if ($row) {
			$data = array(
				'title_page_big'		=> 'Buat Baru',
				'title'					=> $this->title,
				'link_save'				=> site_url() . 'T_mgtvoucher/T_mgtvoucher/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);

			$this->template->load('T_mgtvoucher/T_mgtvoucher_form', $data);
		} else {
			redirect($this->agent->referrer());
		}
	}

	public function update_action()
	{
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);
		$this->log_temp		= $this->session->tempdata($val['id']);
		$val['id']				= _decode_id($val['id'], $this->log_temp);

		$o		= new Outputview();

		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/

		//mencegah data kosong
		if (!$o->not_empty($val['nama_voucher'], '#nama_voucher')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('nama_voucher' => $val['nama_voucher']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#nama_voucher')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['channel_payment'], '#channel_payment')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('channel_payment' => $val['channel_payment']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#channel_payment')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['jenis_pembayaran'], '#jenis_pembayaran')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('jenis_pembayaran' => $val['jenis_pembayaran']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#jenis_pembayaran')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['jenis_cashback'], '#jenis_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('jenis_cashback' => $val['jenis_cashback']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#jenis_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['percent_cashback'], '#percent_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('percent_cashback' => $val['percent_cashback']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#percent_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['nominal_cashback'], '#nominal_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('nominal_cashback' => $val['nominal_cashback']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#nominal_cashback')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['start_datelive'], '#start_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('start_datelive' => $val['start_datelive']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#start_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['end_datelive'], '#end_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('end_datelive' => $val['end_datelive']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#end_datelive')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['wording'], '#wording')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('wording' => $val['wording']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#wording')) {
			echo $o->result();
			return;
		}

		//mencegah data kosong
		if (!$o->not_empty($val['image'], '#image')) {
			echo $o->result();
			return;
		}

		//mencegah data double
		$field = array('image' => $val['image']);
		$exist = $this->tmodel->if_exist($val['id'], $field);
		if (!$o->not_exist($exist, '#image')) {
			echo $o->result();
			return;
		}


		$success = $this->tmodel->update($val['id'], $val);
		echo $o->auto_result($success);
	}

	public function delete_multiple()
	{
		$data = $this->input->get('data_ajax', true);
		$val = json_decode($data, true);
		$data = explode(',', $val['data_delete']);

		//get key generate
		$log_id = $this->session->userdata($this->log_key);
		$xx = 0;
		foreach ($data as $value) {
			$value =  _decode_id($value, $log_id);
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;
		}

		$success = $this->tmodel->delete_multiple($data);

		$o = new Outputview();

		//create message
		if ($success) {
			$o->success 	= 'true';
			$o->message	= 'Data berhasil di hapus !';
		} else {
			$o->success 	= 'false';
			$o->message	= 'Opps..Gagal menghapus data !!';
		}


		echo $o->result();
	}
};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2021-06-07 06:19:40 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/
