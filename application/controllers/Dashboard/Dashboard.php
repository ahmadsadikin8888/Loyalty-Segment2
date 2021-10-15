<?php
require APPPATH . '/controllers/Dashboard/Dashboard_config.php';

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();;
		$this->title = new Dashboard_config();
		$this->load->model('Custom_model/Admin_model', 'admin_model');
		$this->load->model('Custom_model/Kontrak_model', 'kontrak_model');
		$this->load->model('Custom_model/M_category_model', 'category');
		$this->load->model('Custom_model/Voucher_item_model', 'voucher');
		$this->load->model('Custom_model/Transaction_point_new_model', 'transaction_point');
	}




	////render by ajax
	public function index()
	{
		$data = array(
			'title_page_big'		=> 'Report Transaction Point',
			'title'					=> $this->title,
		);
		$data['template'] = "daily";
		$data['datena'] = date('Y-m-d');
		if (isset($_POST['datena'])) {
			$data['datena'] = $_POST['datena'];
		}
		if (isset($_POST['template'])) {
			$data['template'] = $_POST['template'];
		}
		$bulanna_text = array(
			1 => "Jan",
			2 => "Feb",
			3 => "Mar",
			4 => "Apr",
			5 => "May",
			6 => "Jun",
			7 => "Jul",
			8 => "Aug",
			9 => "Sep",
			10 => "oct",
			11 => "Nov",
			12 => "Dec"
		);
		$data['data']['trx'] = $this->get_transaction($data['datena'], $data['template'], $bulanna_text);
		$data['data']['category'] = $this->get_category($data['datena'], $data['template']);
		$data['data']['title_point'] = $this->get_title_point($data['datena'], $data['template']);
		$data['data']['voucher'] = $this->get_voucher($data['datena']);
		// $data['data']['promo'] = $this->get_promo();
		$data['data']['merchant'] = $this->merhant_detail($data['datena']);
		$data['data']['contract'] = $this->contract_detail($data['datena']);
		$data['data']['uniq'] = $this->get_uniq($data['datena'], $data['template'], $bulanna_text);

		$view = 'Dashboard/dashboard';
		$this->load->view($view, $data);
	}
	public function index_v2()
	{
		$data = array(
			'title_page_big'		=> 'Report Transaction Point',
			'title'					=> $this->title,
		);
		$data['template'] = "daily";
		$data['datena'] = date('Y-m-d');
		if (isset($_POST['datena'])) {
			$data['datena'] = $_POST['datena'];
		}
		if (isset($_POST['template'])) {
			$data['template'] = $_POST['template'];
		}
		$bulanna_text = array(
			1 => "Jan",
			2 => "Feb",
			3 => "Mar",
			4 => "Apr",
			5 => "May",
			6 => "Jun",
			7 => "Jul",
			8 => "Aug",
			9 => "Sep",
			10 => "oct",
			11 => "Nov",
			12 => "Dec"
		);
		$data['data']['trx'] = $this->get_transaction($data['datena'], $data['template'], $bulanna_text);
		$data['data']['category'] = $this->get_category($data['datena'], $data['template']);
		$data['data']['title_point'] = $this->get_title_point($data['datena'], $data['template']);
		$data['data']['voucher'] = $this->get_voucher($data['datena']);
		// $data['data']['promo'] = $this->get_promo();
		$data['data']['merchant'] = $this->merhant_detail($data['datena']);
		$data['data']['contract'] = $this->contract_detail($data['datena']);
		$data['data']['uniq'] = $this->get_uniq($data['datena'], $data['template'], $bulanna_text);
		$data['data']['witel'] = $this->get_witel($data['datena'], $data['template']);
		$data['data']['regional'] = $this->get_regional($data['datena'], $data['template']);

		$view = 'Dashboard/dashboard_v2';
		$this->load->view($view, $data);
	}
	public function merhant_detail($datena)
	{
		$year = date('Y');
		$data['active'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM point WHERE YEAR(update_time) >= '$year'  AND DATE(expired) > '$datena' AND status=1 "
		)->row()->numna;
		$data['not_active'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM point WHERE YEAR(update_time) >= '$year' AND ((DATE(expired) <= '$datena' AND status=1) OR (status=0)) "
		)->row()->numna;
		$data['total'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM point WHERE YEAR(update_time) >= '$year' "
		)->row()->numna;
		return $data;
	}
	public function contract_detail($datena)
	{
		$year = date('Y');
		$data['active'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM kontrak WHERE YEAR(periode_awal) >= '$year'  AND DATE(periode_akhir) >= '$datena'"
		)->row()->numna;
		$data['not_active'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM kontrak WHERE YEAR(periode_awal) >= '$year' AND (DATE(periode_akhir) < '$datena' ) "
		)->row()->numna;
		$data['total'] = $this->transaction_point->live_query(
			"SELECT count(*) as numna FROM kontrak WHERE YEAR(periode_awal) >= '$year' "
		)->row()->numna;
		return $data;
	}
	public function get_transaction($datena, $template, $bulanna_text)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		// $last_week = date('Y-m-d', strtotime($w4));
		$new_week = date('Y-m-d', strtotime($w0));
		// if ($template == 'daily') {
		$last_week = $w1;
		// }
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$group_by = " DATE(used_time) ";
				$filter_date = " DATE(used_time) = '$datena' ";
				$filter_date_grafik = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "weekly":
				$group_by = " DATE(used_time) ";
				$filter_date = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				$filter_date_grafik = " DATE(used_time) >= '$w4' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$group_by = " DATE_FORMAT(used_time,'%Y-%m') ";
				$filter_date = " MONTH(used_time) = '$bulan' AND YEAR(used_time) = '$tahun' ";
				$filter_date_grafik = "YEAR(used_time) = '$tahun' AND DATE(used_time) <= '$datena' ";
				break;
		}
		$general_trx = $this->transaction_point->live_query("
		SELECT count(*) as trx,sum(price) as burn
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE $filter_date $general_filter
		")->row();
		$data['total']['trx'] = $general_trx->trx;
		$data['total']['burn'] = $general_trx->burn;

		$query = $this->transaction_point->live_query("SELECT t.ncli
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE $filter_date $general_filter
		GROUP BY
		t.ncli
		");
		$result = $query->result();
		$data['uniq_redeem'] = count($result);

		$query = $this->transaction_point->live_query("SELECT 
		$group_by as bulan,count(t.id) as trx,SUM(t.price) as burn,COUNT(DISTINCT(t.ncli)) as uniq_user
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE $filter_date_grafik $general_filter
		GROUP BY
		$group_by
		ORDER BY t.used_time ASC
		");
		$result = $query->result();
		$data['trend'] = array();
		$n = 0;
		$axis = "";
		if (count($result) > 0) {
			foreach ($result as $r) {
				$new_axis = $r->bulan;

				if ($template == 'weekly') {
					$m = date('m', strtotime($r->bulan));
					$num_week = $this->weekOfMonth($r->bulan);
					if ($num_week == '1next') {
						$m = date('m', strtotime('+7 day', strtotime($r->bulan)));
						$num_week = 1;
					}
					$m = intval($m);
					$new_axis = "W " . $num_week . " " . $bulanna_text[$m];
				}
				if ($axis != $new_axis) {
					$n++;
				}
				$data['date'][$n] = $new_axis;
				$data['axis'][$n] = $new_axis;
				$data['trend'][$n]['trx'] = $r->trx + $data['trend'][$n]['trx'];
				$data['trend'][$n]['burn'] = $r->burn + $data['trend'][$n]['burn'];
				$data['trend'][$n]['uniq'] = $r->uniq_user + $data['trend'][$n]['uniq'];


				$axis = $new_axis;
			}
			$last_n = $n - 1;

			$persen_trx = "100";
			$arrow_trx = "ion-android-arrow-dropup";
			$text_trx = "success";
			if (isset($last_n)) {
				$persen = (($data['trend'][$n]['trx'] - $data['trend'][$last_n]['trx']) / $data['trend'][$last_n]['trx']) * 100;
				if ($persen < 0) {
					$arrow_trx = "ion-android-arrow-dropdown";
					$text_trx = "danger";
				}
				$persen_trx = abs($persen);
			}
			$data['persen']['trx']['num'] = number_format($persen_trx, 2) . "%";
			$data['persen']['trx']['arrow'] = $arrow_trx;
			$data['persen']['trx']['text'] = $text_trx;
			$data['persen']['trx']['real'] = $data['trend'][$n]['trx'];

			$persen_burn = "100";
			$arrow_burn = "ion-android-arrow-dropup";
			$text_burn = "success";
			if (isset($last_n)) {
				$persen = (($data['trend'][$n]['burn'] - $data['trend'][$last_n]['burn']) / $data['trend'][$last_n]['burn']) * 100;
				if ($persen < 0) {
					$arrow_burn = "ion-android-arrow-dropdown";
					$text_burn = "danger";
				}
				$persen_burn = abs($persen);
			}
			$data['persen']['burn']['num'] = number_format($persen_burn, 2) . "%";
			$data['persen']['burn']['arrow'] = $arrow_burn;
			$data['persen']['burn']['text'] = $text_burn;
			$data['persen']['burn']['real'] = $data['trend'][$n]['burn'];

			$persen_uniq = "100";
			$arrow_uniq = "ion-android-arrow-dropup";
			$text_uniq = "success";
			if (isset($last_n)) {
				$persen = (($data['trend'][$n]['uniq'] - $data['trend'][$last_n]['uniq']) / $data['trend'][$last_n]['uniq']) * 100;
				if ($persen < 0) {
					$arrow_uniq = "ion-android-arrow-dropdown";
					$text_uniq = "danger";
				}
				$persen_uniq = abs($persen);
			}
			$data['persen']['uniq']['num'] = number_format($persen_uniq, 2) . "%";
			$data['persen']['uniq']['arrow'] = $arrow_uniq;
			$data['persen']['uniq']['text'] = $text_uniq;
			$data['persen']['uniq']['real'] = $data['trend'][$n]['uniq'];
		}

		return $data;
	}
	public function get_uniq($datena, $template, $bulanna_text)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		// $last_week = date('Y-m-d', strtotime($w4));
		$new_week = date('Y-m-d', strtotime($w0));
		// if ($template == 'daily') {
		$last_week = $w1;
		// }
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$filter_date_grafik = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "weekly":
				$filter_date_grafik = " DATE(used_time) >= '$w4' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$filter_date_grafik = "YEAR(used_time) = '$tahun' AND DATE(used_time) <= '$datena' ";
				break;
		}
		$query = $this->transaction_point->live_query("SELECT 
		t.ncli as uniq_user,min(DATE(t.used_time)) as bulan
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		WHERE $filter_date_grafik $general_filter
		GROUP BY
		t.ncli
		ORDER BY t.used_time ASC
		");
		$result = $query->result();
		$data = array();
		if (count($result) > 0) {
			foreach ($result as $r) {
				$new_axis = $r->bulan;

				if ($template == 'weekly') {
					$m = date('m', strtotime($r->bulan));
					$num_week = $this->weekOfMonth($r->bulan);
					if ($num_week == '1next') {
						$m = date('m', strtotime('+7 day', strtotime($r->bulan)));
						$num_week = 1;
					}
					$m = intval($m);
					$new_axis = "W " . $num_week . " " . $bulanna_text[$m];
				}
				if ($template == 'monthly') {
					$new_axis = date('Y-m', strtotime($r->bulan));
				}
				$data[$new_axis] = 1 + $data[$new_axis];
			}
		}
		return $data;
	}
	public function get_category($datena, $template)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$filter_date = " DATE(used_time) = '$datena' ";
				break;
			case "weekly":
				$filter_date = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$filter_date = " MONTH(used_time) = '$bulan' AND YEAR(used_time) = '$tahun' ";
				break;
		}
		$category = $this->category->get_results(array(), array("*"), array(), array("category_id" => "DESC"));
		$query = $this->transaction_point->live_query("SELECT c.category_id,count(t.id) as id_num
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE $filter_date  $general_filter
		GROUP BY
		c.category_id
		ORDER BY count(t.id) DESC
		");
		$result = $query->result();
		if (count($result) > 0) {
			foreach ($result as $r) {
				$data_master[$r->category_id] = $r->id_num;
			}
		}
		if ($category['num'] > 0) {
			foreach ($category['results'] as $r) {
				$data[$r->category_name] = 0;
				if (isset($data_master[$r->category_id])) {
					$data[$r->category_name] = $data_master[$r->category_id];
				}
			}
		}
		arsort($data);
		$n = 0;
		$response = array();
		foreach ($data as $k => $r) {
			if ($n > 4) {
				$response['OTHERS'] = $r + $response['OTHERS'];
			} else {
				$response[$k] = $r;
			}
			$n++;
		}
		$n = 0;
		foreach ($response as $k => $r) {
			$datana[$n] = array("text" => $k, "num" => $r);
			$n++;
		}

		return $datana;
	}
	public function get_witel($datena, $template)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$filter_date = " DATE(used_time) = '$datena' ";
				break;
			case "weekly":
				$filter_date = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$filter_date = " MONTH(used_time) = '$bulan' AND YEAR(used_time) = '$tahun' ";
				break;
		}
		$category = $this->category->get_results(array(), array("*"), array(), array("category_id" => "DESC"));
		$query = $this->transaction_point->live_query("SELECT 
		(select WITEL from m_witel where m_witel.NCLI=t.ncli limit 1 ) WITEL ,count(t.id) as id_num
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE $filter_date  $general_filter
		GROUP BY
		(select WITEL from m_witel where m_witel.NCLI=t.ncli limit 1 )
		ORDER BY count(t.id) DESC
		");
		$result = $query->result();
		if (count($result) > 0) {
			foreach ($result as $r) {
				$data[$r->WITEL] = $r->id_num;
			}
		}
		arsort($data);
		$n = 0;
		$response = array();
		$other = array();
		foreach ($data as $k => $r) {
			if ($n > 4) {
				$other['OTHERS'] = $r + $other['OTHERS'];
			} else {
				if ($k == "") {
					$other['OTHERS'] = $r + $other['OTHERS'];
				} else {
					$response[$k] = $r;
					$n++;
				}
			}
		}
		$n = 0;
		foreach ($response as $k => $r) {
			$datana[$n] = array("text" => $k, "num" => $r);
			$n++;
		}
		$datana[$n] = array("text" => 'OTHERS', "num" => $other['OTHERS']);
		return $datana;
	}
	public function get_regional($datena, $template)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$filter_date = " DATE(used_time) = '$datena' ";
				break;
			case "weekly":
				$filter_date = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$filter_date = " MONTH(used_time) = '$bulan' AND YEAR(used_time) = '$tahun' ";
				break;
		}
		$category = $this->category->get_results(array(), array("*"), array(), array("category_id" => "DESC"));
		$query = $this->transaction_point->live_query("SELECT 
		(select REG from m_witel where m_witel.NCLI=t.ncli limit 1 ) REG ,count(t.id) as id_num
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE $filter_date  $general_filter
		GROUP BY
		(select REG from m_witel where m_witel.NCLI=t.ncli limit 1 )
		ORDER BY count(t.id) DESC
		");
		$result = $query->result();
		if (count($result) > 0) {
			foreach ($result as $r) {
				$data[$r->REG] = $r->id_num;
			}
		}
		arsort($data);
		$n = 0;
		$response = array();
		foreach ($data as $k => $r) {
			if ($n > 4) {
				$other['OTHERS'] = $r + $other['OTHERS'];
			} else {
				if ($k == "") {
					$other['OTHERS'] = $r + $other['OTHERS'];
				} else {
					$response["Regional " . $k] = $r;
					$n++;
				}
			}
		}
		$n = 0;
		foreach ($response as $k => $r) {
			$datana[$n] = array("text" => $k, "num" => $r);
			$n++;
		}
		$datana[$n] = array("text" => 'OTHERS', "num" => $other['OTHERS']);
		return $datana;
	}
	public function get_title_point($datena, $template)
	{
		$date_now = strtotime($datena);
		$bulan = date('m', $date_now);
		$tahun = date('Y', $date_now);
		$w0 = date('Y-m-d', strtotime('last monday', $date_now));
		$w1 = date('Y-m-d', strtotime("-7 day", strtotime($w0)));
		$w2 = date('Y-m-d', strtotime("-7 day", strtotime($w1)));
		$w3 = date('Y-m-d', strtotime("-7 day", strtotime($w2)));
		$w4 = date('Y-m-d', strtotime("-7 day", strtotime($w3)));
		// $last_week = date('Y-m-d', strtotime($w4));
		$new_week = date('Y-m-d', strtotime($w0));
		// if ($template == 'daily') {
		$last_week = $w1;
		// }
		$general_filter = " AND use_exp = 0";
		switch ($template) {
			case "daily":
				$filter_date = " DATE(used_time) = '$datena' ";
				break;
			case "weekly":
				$filter_date = " DATE(used_time) >= '$w0' AND DATE(used_time) <= '$datena' ";
				break;
			case "monthly":
				$filter_date = " MONTH(used_time) = '$bulan' AND YEAR(used_time) = '$tahun' ";
				break;
		}
		$query = $this->transaction_point->live_query("SELECT t.title_point,count(t.id) as id_num
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE $filter_date $general_filter
		GROUP BY
		t.title_point
		ORDER BY count(t.id) DESC
		");
		$result = $query->result();
		if (count($result) > 0) {
			foreach ($result as $r) {
				$data[$r->title_point] = $r->id_num;
			}
		}

		arsort($data);
		$n = 0;
		$response = array();
		foreach ($data as $k => $r) {
			if ($n > 4) {
				$response['OTHERS'] = $r + $response['OTHERS'];
			} else {
				$response[$k] = $r;
			}
			$n++;
		}
		$n = 0;
		foreach ($response as $k => $r) {
			$datana[$n] = array("text" => $k, "num" => $r);
			$n++;
		}
		return $datana;
	}
	public function get_merchant($start_filter, $end_filter)
	{
		$query = $this->transaction_point->live_query("SELECT t.title_point,c.category_name,count(t.id) as id_num,SUM(t.price) as price_sum,COUNT(DISTINCT(t.ncli)) as uniq_user
		FROM transaction_point_new t
		LEFT JOIN ncli on ncli.id = `t`.`ncli` 
		LEFT JOIN point b ON b.id=t.point_id
		LEFT JOIN m_category c ON c.category_id=b.category_id
		WHERE use_exp=0 AND DATE(used_time) >= '$start_filter' AND DATE(used_time) <= '$end_filter' 
		GROUP BY
		t.title_point
		ORDER BY count(t.id) DESC
		");
		$result = $query->result();
		$data['result'] = $result;

		return $data;
	}
	public function get_promo()
	{
		$query = $this->transaction_point->live_query("SELECT status,count(id) as id_num
		FROM point
		GROUP BY
		status
		");
		$result = $query->result();
		$data['total'] = 0;
		if (count($result) > 0) {
			foreach ($result as $r) {
				$data[$r->status] = $r->id_num;
				$data['total'] = $r->id_num + $data['total'];
			}
		}

		return $data;
	}
	public function get_voucher($datena)
	{
		$year = date('Y');
		$data['used'] = $this->voucher->live_query("SELECT count(*) as numna FROM voucher_item WHERE YEAR(update_time) = '$year' AND status=1 AND used_time IS NOT NULL ")->row()->numna;
		$data['expired'] = $this->voucher->live_query("SELECT count(*) as numna FROM voucher_item WHERE YEAR(update_time) = '$year' AND status=0 AND DATE(expired_time) <= '$datena' ")->row()->numna;
		$data['online'] = $this->voucher->live_query("SELECT count(*) as numna FROM voucher_item WHERE YEAR(update_time) = '$year' AND status=0 AND DATE(expired_time) > '$datena' ")->row()->numna;
		$data['total'] = $this->voucher->live_query("SELECT count(*) as numna FROM voucher_item WHERE YEAR(update_time) = '$year' ")->row()->numna;

		return $data;
	}
	function weekOfMonth($date)
	{
		// estract date parts
		list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

		// current week, min 1
		$w = 1;

		// for each day since the start of the month
		for ($i = 1; $i < $d; ++$i) {
			// if that day was a sunday and is not the first day of month
			if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
				// increment current week
				++$w;
			}
		}
		$mna = date('m', strtotime($date));
		if ($mna == '01') {
			if ($w > 5) {
				$w = '1next'; //So answer will be 1
			}
		} else {
			if ($w > 4) {
				$w = '1next'; //So answer will be 1
			}
		}

		// now return
		return $w;
	}
};
