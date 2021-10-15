<!-- load css selectize-->
<!-- tempatkan code ini pada top page view-->
<?php echo _css('datatables,icheck,selectize,multiselect') ?>


<div class='col-md-12 col-xl-12'>
	<div class="card">
		<div class="card-status bg-green"></div>
		<div class="card-header">
			<h3 class="card-title">FILTER
			</h3>
			<div class="card-options">
				<a href="#" class="card-options-collapse " data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
				<a href="#" class="card-options-fullscreen " data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
			</div>
		</div>
		<div class="card-body">
			<div class='box-body' id='box-table'>

				<form id='form-a' methode="GET">
					<div class="row">
					<div class='col-md-6 col-xl-6'>
						<div class='form-group'>
							<label class='form-label'>Mulai Dari</label>
							<input type='date' class='form-control data-sending focus-color' id='id_reason' name='start' value='<?php if (isset($_GET['start'])) echo $_GET['start'] ?>'>
						</div>
					</div>
					<div class='col-md-6 col-xl-6'>
						<div class='form-group'>
							<label class='form-label'>Sampai </label>
							<input type='date' class='form-control data-sending focus-color' id='id_reason' name='end' value='<?php if (isset($_GET['end'])) echo $_GET['end'] ?>'>
						</div>
					</div>
					<div class='col-md-6 col-xl-6'>
						<div class='form-group'>
							<label class='form-label'>Category </label>
							<select name="category" class='form-control data-sending focus-color' id="category" onchange="getval(this);">
								<option value="all">--All Category --</option>
								<?php
								if (count($list_category) > 0) {
									foreach ($list_category as $r) {
										$selected = "";
										if ($r->category_id == $filter_category) {
											$selected = "selected";
										}
										echo "<option value='" . $r->category_id . "' $selected>" . $r->category_name . "</option>";
									}
								}
								?>
							</select>

						</div>
					</div>
					<div class='col-md-6 col-xl-6'>
						<div class='form-group'>
							<label class='form-label'>Merchant </label>
							<select name="point_id" class='form-control data-sending focus-color' id="point_id">
								<option value="all" class='cat-all'>--All Merchant --</option>
								<?php
								if (count($list_merchant) > 0) {
									foreach ($list_merchant as $r) {
										$selected = "";
										if ($r->id == $filter_merchant) {
											$selected = "selected";
										}
										echo "<option value='" . $r->id . "' class='cat-" . $r->category_id . "' $selected>" . $r->title . "</option>";
									}
								}
								?>
							</select>

						</div>
					</div>


					<div class='col-md-12 col-xl-12'>

						<div class='form-group'>
							<button id='btn-save' type='submit' class='btn btn-primary'><i class="fe fe-save"></i> Search</button>
						</div>

					</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
<?php

if (isset($_GET['start']) && isset($_GET['end'])) {


?>

	<div class='col-md-12 col-xl-12'>
		<div class="card">
			<div class="card-status bg-orange"></div>
			<div class="card-header">
				<h3 class="card-title">Merchant

				</h3>
				<div class="card-options">
					<a href="#" class="card-options-collapse " data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-fullscreen " data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
				</div>
			</div>
			<div class="card-body">
				<div class='box-body table-responsive' id='box-table'>
					<small>
						<table class='table' id="report_table_merchant" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Kategori</th>
									<th>Merchant</th>
									<th>Transaksi</th>
									<th nowrap>Burn Poin</th>
									<th nowrap>Uniq Redeem</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$n = 0;
								if (count($data['merchant']['result']) > 0) {
									foreach ($data['merchant']['result'] as $r) {
										$n++;
								?>
										<tr>
											<td><?php echo $n; ?></td>
											<td><?php echo $r->category_name; ?></td>
											<td><?php echo $r->title_point; ?></td>

											<td><?php echo $r->id_num; ?></td>
											<td><?php echo $r->price_sum; ?></td>
											<td><?php echo $r->uniq_user; ?></td>
										</tr>
								<?php
									}
								}
								?>
							</tbody>
						</table>
					</small>
				</div>
			</div>
		</div>
	</div>
	<div class='col-md-12 col-xl-12'>
		<div class="card">
			<div class="card-status bg-orange"></div>
			<div class="card-header">
				<h3 class="card-title">Transaction

				</h3>
				<div class="card-options">
					<a href="#" class="card-options-collapse " data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-fullscreen " data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
				</div>
			</div>
			<div class="card-body">
				<div class='box-body table-responsive' id='box-table'>
					<small>
						<table class='table' id="report_table_reg">
							<thead>
								<tr>
									<th nowrap>#</th>
									<th nowrap>Redeem TIme</th>
									<th nowrap>ID</th>
									<th nowrap>DESC</th>
									<th>NCLI</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Hp</th>
									<th>ND</th>
									<th nowrap>Title Poin</th>
									<th>Realname</th>
									<th>Merchant</th>
									<th>Price</th>
									<th nowrap>Used Merchant</th>
									<th>Witel</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$n = 0;
								if (count($data['merchant']['trx']) > 0) {
									foreach ($data['merchant']['trx'] as $r) {
										$n++;
										$desc = $r->trx_id;
										$nama = $r->PIC;
										$key = "rE@D25";
										// if(strpos($desc,"indipass.indihome")>0){
										// 	$parts = parse_url($desc);
										// 	$trx=$parts['query'];
										// 	$rcvdString=$controller->decrypt($trx,$key);
										// 	$rcvdString = str_replace("", '', $rcvdString);
										// 	$rcvdString = str_replace("", '', $rcvdString);
										// 	$ctrx_id = str_replace("trxid=", '', $rcvdString);
										// 	$link="http://indipass.indihome.co.id" . $parts['path'] . "?" . $rcvdString; 
										// }else{
										$link = $desc;
										// }    
										if ($nama == "") {
											$NAMA_PIC = $r->NAMA_PEMILIK;
										} else {
											$NAMA_PIC = $nama;
										}
								?>
										<tr>
											<td nowrap><?php echo $n; ?></td>
											<td nowrap><?php echo $r->used_time; ?></td>
											<td nowrap><?php echo $r->trx_id; ?></td>
											<td nowrap><?php echo $link; ?></td>
											<td nowrap><?php echo $r->ncli; ?></td>
											<td nowrap><?php echo $NAMA_PIC; ?></td>
											<td nowrap><?php echo $r->email; ?></td>
											<td nowrap><?php echo $r->msisdn; ?></td>
											<td nowrap><?php echo $r->nd; ?></td>
											<td nowrap><?php echo $r->title_point; ?></td>
											<td nowrap><?php echo $r->realname; ?></td>
											<td nowrap><?php echo $r->kode_merchant; ?></td>
											<td nowrap><?php echo $r->price; ?></td>
											<td nowrap><?php echo $r->used_merchant; ?></td>
											<td nowrap><?php echo $r->WITEL; ?></td>
										</tr>
								<?php
									}
								}
								?>
							</tbody>
						</table>
					</small>
				</div>
			</div>
		</div>
	</div>

<?php

}
?>
<!-- load library selectize -->
<!-- tempatkan code ini pada akhir code html sebelum masuk tag script-->
<?php echo _js('ybs,selectize,datatables,icheck,multiselect') ?>
<script type="text/javascript">
	function getval(sel) {
		var cat=$("#category").val();
		$("#point_id option").hide();
		$(".cat-" + cat).show();
		// alert(cat);
	}
	$(document).ready(function() {

		$("#report_table_reg").DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf'
			]
		});
		$("#report_table_merchant").DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf'
			]
		});
	});
</script>