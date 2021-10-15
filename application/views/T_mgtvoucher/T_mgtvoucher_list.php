<?php echo _css('datatables,icheck') ?>

<?php echo card_open('List of Voucher', 'bg-teal', true) ?>
<div class='row'>
	<div class='col-md-6 col-lg-4'>
		<?php echo button_card($title->general->button_create, $title->general->button_create_desc, 'text-green', 'btn-success', 'fe fe-list', 'bg-green', 'btn-create', $link_create) ?>
	</div>
</div>

<div class='box-body ' id='box-table'>
	<small>

		<table class='responsive display nowrap' id="example" style="width: 100%;">
			<thead>
				<tr>
					<th><b>No</b></th>
					<th><b>Image</b></th>
					<th><b>Nama Voucher</b></th>
					<th><b>is Live?</b></th>
					<th><b>Channel Payment</b></th>
					<th><b>Jenis Pembayaran</b></th>
					<th><b>Jenis Cashback</b></th>
					<th><b>Percent</b></th>
					<th><b>Nominal Cashback</b></th>
					<th><b>Start Datelive</b></th>
					<th><b>End Date Live</b></th>
					<th><b>Wording</b></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor = 1;

				if (count($list_outbound) > 0) {
					foreach ($list_outbound as $datana) {
				?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><img src="<?php echo base_url() ?>assets/contohvoucher.jpg"></td>
							<td><?php echo $datana->nama_voucher; ?></td>
							<td>
								<label class="custom-switch">
									<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
									<span class="custom-switch-indicator"></span>
								</label>
							</td>
							<td><?php echo $datana->channel_payment; ?></td>
							<td>Prepaid</td>
							<td><?php echo $datana->jenis_cashback; ?></td>
							<td><?php echo $datana->percent_cashback; ?></td>
							<td><?php echo $datana->nominal_cashback; ?></td>
							<td><?php echo $datana->start_datelive; ?></td>
							<td><?php echo $datana->end_datelive; ?></td>
							<td><?php echo $datana->wording; ?></td>
						</tr>
				<?php
						$nomor++;
					}
				} else {
					echo "<td colspan='10'>Tidak ada data</td>";
				}
				?>

			</tbody>
		</table>
	</small>
</div>



<?php echo card_close() ?>

<?php echo _js('datatables,icheck') ?>

<script>
	var page_version = "1.0.8"
</script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>