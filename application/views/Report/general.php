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
	<div class='col-md-6 col-xl-6'>
		<div class="card">
			<div class="card-status bg-orange"></div>
			<div class="card-header">
				<h3 class="card-title">Report Periode <?php echo $_GET['start'] . " sd " . $_GET['end'] ?>
				</h3>
				<div class="card-options">
					<a href="#" class="card-options-collapse " data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
					<a href="#" class="card-options-fullscreen " data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
				</div>
			</div>
			<div class="card-body">
				<div class='box-body table-responsive' id='box-table'>
					<small>
						<table class='table'>
							<thead>
								<tr>
									<th>Merchant</th>
									<th>Transaction</th>
									<th>Burn Poin</th>
									<th>Uniq Redeem</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo number_format(count($data['merchant']['result'])); ?></td>
									<td><?php echo number_format($total['trx']); ?></td>
									<td><?php echo number_format($total['burn']); ?></td>
									<td><?php echo number_format($data['trx']['uniq_redeem']); ?></td>
								</tr>
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
				<h3 class="card-title">Report Periode <?php echo $_GET['start'] . " sd " . $_GET['end'] ?>

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
								if (count($data['trx']['result']) > 0) {
									foreach ($data['trx']['result'] as $r) {
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