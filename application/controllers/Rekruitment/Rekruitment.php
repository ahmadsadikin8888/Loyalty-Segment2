<?php

require APPPATH . '/controllers/Rekruitment/Rekruitment_config.php';

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Rekruitment extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$this->load->model('Custom_model/Sys_dok_model', 'Sys_dok_model');
		$this->load->model('Custom_model/Sys_dok_user_model', 'Sys_dok_user_model');
		$this->load->model('sys/Sys_user_model', 'tmodel');
		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$this->log_key = 'log_Rekruitment';
		$this->title = new Rekruitment_config();
	}


	public function index()
	{
		$data = array(
			'title_page_big'		=> 'List Tabel Data Recruitment',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url() . 'Rekruitment/Rekruitment/refresh_table/' . $this->_token,
			'link_create'			=> site_url() . 'Rekruitment/Rekruitment/create',
			'link_update'			=> site_url() . 'Rekruitment/Rekruitment/update',
			'link_delete'			=> site_url() . 'Rekruitment/Rekruitment/delete_multiple',
		);
		$start = date('Y-m-d');
		$end = date('Y-m-d');
		if (isset($_GET['start']) && isset($_GET['end'])) {
			$start = $_GET['start'];
			$end = $_GET['end'];
		}

		$this->template->load('Rekruitment/Rekruitment_list', $data);
	}

	function get_data_list()
	{

		$data = array(
			'title_page_big'		=> 'List Tabel Data Rekruitment',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url() . 'Rekruitment/Rekruitment/refresh_table/' . $this->_token,
			'link_create'			=> site_url() . 'Rekruitment/Rekruitment/create',
			'link_update'			=> site_url() . 'Rekruitment/Rekruitment/update',
			'link_delete'			=> site_url() . 'Rekruitment/Rekruitment/delete_multiple',
		);

		$data['controller'] = $this;
		$data['data'] = $this->Sys_user_table_model->live_query("SELECT * FROM sys_user WHERE opt_level=3 ")->result_array();
		$this->load->view('Rekruitment/Rekruitment_area', $data);
	}

	public function detail($id = false)
	{
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		if ($userdata->opt_level = 3) {
			$id = $logindata->id_user;
		}
		$data = array(
			'title_page_big'		=> 'List Tabel Data Dok Recruitment',
			'title'					=> $this->title,
			'id'					=> $id,
			'link_refresh_table'	=> site_url() . 'Rekruitment/Rekruitment/refresh_table_upload/' . $id . '/' . $this->_token,
		);

		$this->template->load('Rekruitment/Rekruitment_detail', $data);
	}
	function get_data_list_upload($id = false)
	{

		$data = array(
			'title_page_big'		=> 'List Tabel Data Dokumen Rekruitment',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url() . 'Rekruitment/Rekruitment/refresh_table/' . $this->_token,
			'token'	=> $this->_token,
			'link_create'			=> site_url() . 'Rekruitment/Rekruitment/create',
			'link_update'			=> site_url() . 'Rekruitment/Rekruitment/update',
			'link_delete'			=> site_url() . 'Rekruitment/Rekruitment/delete_multiple',
		);
		if ($id == false) {
			$id = $this->_user_id;
		}
		$data['controller'] = $this;
		$dok = $this->Sys_dok_model->live_query("SELECT * FROM sys_dok WHERE opt_status=1 ")->result();
		if (count($dok) > 0) {
			foreach ($dok as $r) {
				$dok_user = $this->Sys_dok_model->live_query("SELECT * FROM sys_dok_user WHERE id_user=$id AND dok=$r->id ")->row();

				$data['dok'][$r->id]['dok'] = $r->dok;
				$data['dok'][$r->id]['id_dok'] = $r->id;
				$data['dok'][$r->id]['status'] = 'Belum Diupload';
				$data['dok'][$r->id]['file'] = '';
				$data['dok'][$r->id]['tgl_upload'] = '';
				if ($dok_user) {
					$data['dok'][$r->id]['id'] = $dok_user->id;
					$data['dok'][$r->id]['status'] = 'Sudah Diupload';
					$data['dok'][$r->id]['file'] = $dok_user->file;
					$data['dok'][$r->id]['tgl_upload'] = $dok_user->tgl_upload;
				}
			}
		}
		$data['id_user'] = $id;
		$this->load->view('Rekruitment/Rekruitment_area_upload', $data);
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
	private function get_level()
	{
		$this->load->model('sys/Sys_level_model', 'tlevel');
		$row = $this->tlevel->get_all();
		return $row;
	}
	public function create($id = false)
	{
		$data = array(
			'title_page_big'			=> 'Buat Rekruitment Baru',
			'link_save'					=> site_url() . 'Rekruitment/Rekruitment/create_action',
			'link_prepare_picture'		=> site_url() . 'Rekruitment/Rekruitment/prepare_picture/' . $this->_token,
			'link_back'					=> $this->agent->referrer(),
			'id'						=> '',
			'nmuser'					=> '',
			'nama'					=> '',
			'kategori'					=> '',
			'agentid'					=> '',
			'nmpicture'					=>  'Picture Profile',
			'nmlevel'					=> '',
			'selected_status'			=> '1',
			'selected_level'			=> '',
			'data_level'				=> $this->get_level(),
			'picture'					=> '_profile.png',
			'tl'					=> '',

		);

		if ($id != false) {
		}
		$this->template->load('Rekruitment/Rekruitment_form', $data);
	}

	public function create_action()
	{
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);
		$o = new Outputview();
		if ($val['email'] == "") {
			$o->success = 'false';
			$o->message = 'Email belum di isi';
			$o->elementid = '#input-email';
			echo $o->result();
			return;
		}
		if ($val['name'] == "") {
			$o->success = 'false';
			$o->message = 'Nama Lengkap belum di isi';
			$o->elementid = '#input-name';
			echo $o->result();
			return;
		}
		if ($val['phone'] == "") {
			$o->success = 'false';
			$o->message = 'Dandphone belum di isi';
			$o->elementid = '#input-phone';
			echo $o->result();
			return;
		}

		$field = array();
		$field['email'] = $val['email'];
		$exist = $this->tmodel->if_exist('', $field);
		if ($exist) {
			$o->success  = 'false';
			$o->message = 'Email sudah digunakan';
			$o->elementid = '#input-email';
			echo $o->result();
			return;
		}

		if ($val['opt_level'] == "") {
			$o->success = 'false';
			$o->message = 'Level belum di pilih';
			$o->elementid = '#select-level-user';
			echo $o->result();
			return;
		}



		unset($val['id']);
		$val['nmuser'] = $val['email'];
		$val['passuser'] = _generate($val['passuser']);


		//memastikan file foto temp ada..
		$a = $val['picture'];
		if (!is_file($a) && $a !== "default.png" && $a !== "-") {
			$o->success = 'false';
			$o->message = 'Foto belum di isi';
			$o->elementid = '';
			echo $o->result();
			return;
		}



		$success = $this->tmodel->insert($val);


		if ($success) {
			if ($val['picture'] !== 'default.png') {
				unlink($val['picture']);
			}

			$o->success = 'true';
			$o->message = "User berhasil di buat";
			$o->elementid = '#input-nama-user';
			echo $o->result();
		} else {
			$o->success = 'false';
			$o->message = "Opps..gagal";
			$o->elementid = '';
			echo $o->result();
		}
	}
	function set_session()
	{
		$random_char = 1;
		$characters = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
		$keys = array();
		while (count($keys) < 8) {
			$x = mt_rand(0, count($characters) - 1);
			if (!in_array($x, $keys)) {
				$keys[] = $x;
			}
		}
		foreach ($keys as $key) {
			$random_char .= $characters[$key];
		}
		$today = date('mdH');
		$var_tiket = $today . $random_char;

		return $var_tiket;
	}
	public function update($id = false)
	{
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data 			= $this->security->xss_clean($id);
		$idgenerate		= $id;

		$this->log_temp = $this->session->userdata($this->log_key);
		$this->session->set_tempdata($id, $this->log_temp);

		$id = _decode_id($id, $this->log_temp);
		if ($id == false) {
			$id = $this->_user_id;
		}
		$row = $this->tmodel->get_by_id($id);

		if ($row) {
			$data = array(
				'title_page_big'		=> 'Update Recruitment ' . $row->nmuser,
				'link_save'				=> site_url() . 'Rekruitment/Rekruitment/update_action',
				'link_prepare_picture'	=> site_url() . 'Rekruitment/Rekruitment/prepare_picture/' . $this->_token,
				'link_back'				=> $this->agent->referrer(),
				'selected_status'		=> $row->opt_status,
				'selected_level'		=> $row->opt_level,
				'nmuser'				=> $row->nmuser,
				'name'				=> $row->name,
				'email'				=> $row->email,
				'address'				=> $row->address,
				'phone'				=> $row->phone,
				'nmpicture'				=> $row->nmuser,
				'nmlevel'				=> $row->nmlevel,
				'id'					=> $idgenerate,
				'data_level'			=> $this->get_level(),
				'picture'				=> base_url() . 'YbsService/get_picture/' . $this->_token . $this->_separator_a . $row->picture,
			);


			//identifikasi yang mengupdate adalah configurator 
			if ($this->_user_id == $id && $id == '1') {
				$this->template->load('Rekruitment/User_form_update', $data);
			} else if ($this->_user_id !== $id && $id == '1') {
				$this->session->set_flashdata('auth_form', 'Opps Akses terbatas, hanya bisa di akses oleh Level Configurator');
				redirect($this->agent->referrer());
			} else {
				$this->template->load('Rekruitment/User_form_update', $data);
			}
		} else {
			redirect($this->agent->referrer());
		}
	}

	public function update_action()
	{
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);

		$this->log_temp = $this->session->tempdata($val['id']);
		$val['id']	=	_decode_id($val['id'], $this->log_temp);

		$o = new Outputview();
		if ($val['email'] == "") {
			$o->success = 'false';
			$o->message = 'Email belum di isi';
			$o->elementid = '#input-email';
			echo $o->result();
			return;
		}

		$field = array();


		//identifikasi update account configurator
		if ($val['id'] == '1') {
			$val['opt_level'] = '1';
			$val['opt_status'] = '1';
		}





		if ($val['select-reset'] == 'on') {
			if ($val['passuser'] == "") {
				$o->success  = 'false';
				$o->message = 'password belum di isi';
				$o->elementid = '#input-pass-user';
				echo $o->result();
				return;
			}

			$val['passuser'] = _generate($val['passuser']);
		} else {
			unset($val['passuser']);
		}

		unset($val['select-reset']);

		//set oldpicture
		$old_p  = $this->tmodel->get_picture_for_update_byid($val['id']);

		$val['oldpicture'] = $old_p->picture;
		if ($userdata->opt_level == 3) {
			$val['id'] = $userdata->id_user;
		}
		$this->tmodel->update($val['id'], $val);

		$o->success  = 'true';
		$o->message = 'data berhasil di update';
		echo $o->result();
	}

	// public function delete_multiple()
	// {
	// 	$data = $this->input->get('data_ajax', true);
	// 	$val = json_decode($data, true);
	// 	$data = explode(',', $val['data_delete']);

	// 	//get key generate
	// 	$log_id = $this->session->userdata($this->log_key);
	// 	$xx = 0;
	// 	foreach ($data as $value) {
	// 		$value =  _decode_id($value, $log_id);
	// 		//menganti ke id asli
	// 		$data[$xx] = $value;
	// 		$xx++;
	// 	}

	// 	$success = $this->tmodel->delete_multiple($data);

	// 	$o = new Outputview();

	// 	//create message
	// 	if ($success) {
	// 		$o->success 	= 'true';
	// 		$o->message	= 'Data berhasil di hapus !';
	// 	} else {
	// 		$o->success 	= 'false';
	// 		$o->message	= 'Opps..Gagal menghapus data !!';
	// 	}


	// 	echo $o->result();
	// }

	public function delete_multiple($idx)
	{

		$data = $idx;
		// echo var_dump($data);
		$success = $this->tmodel->delete_multiple($data);

		$o = new Outputview();

		// //create message
		if ($success) {
			$o->success 	= 'true';
			$o->message	= 'Data berhasil di hapus !';
			redirect(site_url() . "Tvv/Tvv/");
		} else {
			$o->success 	= 'false';
			$o->message	= 'Opps..Gagal menghapus data !!';
			redirect(site_url() . "Tvv//");
		}


		echo $o->result();
	}
	public function upload_file($id_dok, $token, $id_user = false)
	{
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data = array(
			'title_page_big'		=> 'UPLOAD DOCUMENT',
			'title'					=> $this->title,
			'link_upload_template'			=> base_url() . 'Rekruitment/Rekruitment/upload_file_proses/' . $this->_token,
		);
		$data['dok'] = $this->Sys_dok_model->live_query("SELECT * FROM sys_dok WHERE id='$id_dok' ")->row();

		if ($token == $this->_token) {
			if ($userdata->opt_level = 3) {
				$id_user = $logindata->id_user;
			}
			$data['id_user'] = $id_user;
			$this->template->load('Rekruitment/upload', $data);
		} else {
			redirect('Auth');
		}
	}
	public function upload_file_proses($token)
	{
		
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));

		$tm = time();
		$post = $this->input->post();
		$filename = $_FILES["inputfile"]["name"];
		$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
		$config['upload_path']          = 'temp_upload/dokument/';
		$config['allowed_types']        = 'pdf|jpg|png|doc|docx|ppt|pptx';
		$config['max_size']             = 60000000;
		$config['file_name']			= $post['id_user'] . "-" . $post['dok'] . '-' . $tm . '.' . $file_ext;
		$config['overwrite']			= TRUE;
		$id_user = $post['id_user'];
		if ($userdata->opt_level = 3) {
			$id_user = $logindata->id_user;
		}
		$dok = $post['dok'];
		$file_name = $config['file_name'];
		// echo $config['file_name'];

		$this->load->library('upload', $config);

		$o = array();
		if (!$this->upload->do_upload('inputfile')) {

			$em = $this->upload->display_errors();
			$em = str_replace('You did not select a file to upload.', 'Tidak ada file yang di pilih', $em);

			$o['success'] 	= 'false';
			$o['message']	= $em;
			$o['elementid'] = '#inputfile';
			$o['sec_val']	=  $this->security->get_csrf_token_name() . "=" . $this->security->get_csrf_hash() . "&";
			$o = json_encode($o);
			echo $o;
			return;
		} else {
			$path_file = $config['upload_path'] . $config['file_name'];

			$dataError = array();

			if (count($dataError) > 0) {
				unlink($path_file);
				$o['success']		= 'false';
				$o['message'] 		= $dataError;
				$o['original_name']	= $this->upload->data('client_name');
				$o['sec_val']		=  $this->security->get_csrf_token_name() . "=" . $this->security->get_csrf_hash() . "&";
				$o = json_encode($o);
				echo $o;
				return;
			} else {
				$where = array(
					"dok" => $dok,
					"id_user" => $id_user
				);
				$data_insert = array(
					"dok" => $dok,
					"id_user" => $id_user,
					"file" => $file_name,
					"tgl_upload" => date('Y-m-d H:i:s')
				);
				$cek = $this->Sys_dok_user_model->get_count($where);
				if ($cek > 0) {
					$this->Sys_dok_user_model->edit($where, $data_insert);
				} else {
					$this->Sys_dok_user_model->add($data_insert);
				}
				$o['success']		= 'true';
				$o['message'] 		= "<small> Dokument berhasil di upload.</small><br> ";
				$o['original_name']	= $this->upload->data('client_name');
				$o['sec_val']		=  $this->security->get_csrf_token_name() . "=" . $this->security->get_csrf_hash() . "&";
				$o = json_encode($o);
				echo $o;
				return;
			}
		}
	}
};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-06-02 15:25:04 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/