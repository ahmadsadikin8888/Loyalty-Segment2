<?php echo _css('selectize,datepicker') ?>

<div class="card col-6">
	<div class="card-status bg-green"></div>
	<div class="card-header">
		<h3 class="card-title">Form</h3>
		<div class="card-options"><a href="javascript:void(0)" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a href="javascript:void(0)" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a></div>
	</div>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/editor_text/src/richtext.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/editor_text/font-awesome.min.css">
	<form action="<?php echo base_url() ?>T_mgtvoucher/T_mgtvoucher/insertdata" method="post" enctype="multipart/form-data">

		<input hidden class='data-sending' id='id' value='<?php if (isset($id)) echo $id ?>'>

		<div class='col-md mt-3'>
			<table width="100%">
				<tr>
					<td width='30%'>Nama Voucher</td>
					<td><input required type='text' class='form-control data-sending focus-color' id='nama_voucher' name='nama_voucher' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->nama_voucher ?>'>
					</td>
				</tr>
				<tr>
					<td>Kode Voucher</td>
					<td> <input required type='text' class='form-control data-sending focus-color col-5' id='kode_voucher' name='kode_voucher' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->kode_voucher ?>'>
					</td>
				</tr>
				<tr>
					<td>Channel Payment</td>
					<td> <select required name='channel_payment[]' id="select-agent" class="form-control custom-select" multiple="multiple">
							<option value="0">--Semua Channel--</option>
							<?php
							if (count($list_agent_d->result()) > 0) {
								foreach ($list_agent_d->result() as $d_agent) {
									$selected = "";
									echo "<option value='" . $d_agent->id . "' " . $selected . ">" . $d_agent->id . "-" . $d_agent->nama_channel . "</option>";
								}
							}
							?>

						</select></td>
				</tr>
				<tr>
					<td></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Jenis Pembayaran</td>
					<td> <select required name='jenis_pembayaran[]' id="select-agent" class="form-control custom-select" multiple="multiple">
							<option value="0">--Semua Jenis Pembayaran--</option>
							<option value="1">Postpaid</option>
							<option value="2">Prepaid</option>
						</select></td>
				</tr>
				<tr>
					<td>Jenis Cashback</td>
					<td>
						<select required name='jenis_cashback' id="select-agent" class="form-control custom-select">
							<option value="1">Percent (%)</option>
							<option value="2">Nominal</option>
						</select>

					</td>
				</tr>
				<tr>
					<td>Jumlah Percent</td>
					<td>
						<input type='text' class='form-control data-sending focus-color' id='percent_cashback' name='percent_cashback' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->percent_cashback ?>'>

					</td>
				</tr>
				<tr>
					<td>Nominal</td>
					<td>
						<input type='text' class='form-control data-sending focus-color' id='nominal_cashback' name='nominal_cashback' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->nominal_cashback ?>'>

					</td>
				</tr>
				<tr>
					<td>Max Nominal</td>
					<td>
						<input type='text' class='form-control data-sending focus-color' id='max_nominal' name='max_nominal' value='<?php if (isset($data)) echo $data->max_nominal ?>'>


					</td>
				</tr>
				<tr>
					<td></td>
					<td> </td>
				</tr>
			</table>
		</div>


		<div class='col-md-12 col-xl-12'>
			<div class='form-group'>
				<label class='form-label'>Start Date Live</label>
				<input type='datetime-local' class='form-control data-sending focus-color' id='start_datelive' name='start_datelive' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->start_datelive ?>'>
			</div>
		</div>


		<div class='col-md-12 col-xl-12'>
			<div class='form-group'>
				<label class='form-label'>End Date Live</label>
				<input type='datetime-local' class='form-control data-sending focus-color' id='end_datelive' name='end_datelive' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->end_datelive ?>'>
			</div>
		</div>


		<div class='col-md-12 col-xl-12'>
			<div class='form-group'>
				<label class='form-label'>Wording</label>
				<textarea class="temp_wa data-sending" name="temp_wa"><?php if (isset($data)) echo $data->wording ?></textarea>
			</div>
		</div>


		<div class='col-md-12 col-xl-12'>
			<div class='form-group'>
				<label class='form-label'>Image</label>
				<input type='file' class='form-control data-sending focus-color' id='image' name='image' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if (isset($data)) echo $data->image ?>'>
			</div>
		</div>



		<div class='col-md-12 col-xl-12'>

			<div class='form-group'>
				<button id='btn-save' type='submit' class='btn btn-success'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>
				<button id='btn-cancel' type='button' class='btn btn-secondary float-right'> Cancel</button>
			</div>

		</div>
	</form>


	<?php echo card_close() ?>

	<?php echo _js('selectize,datepicker') ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/editor_text/src/jquery.richtext.js"></script>

	<script>
		var page_version = "1.0.8"
	</script>
	<script type="text/javascript">
		var custom_select = $('.custom-select').selectize({});
		var custom_select_link = $('.custom-select-link');
		$(document).ready(function() {
			$('.temp_wa').richText({
				ol: false,
				ul: false,
				heading: false,
				imageUpload: false,
				fileUpload: false,
				removeStyles: false,

			});
		});
		$('#btn-cancel').click(function() {
			cancel();

		});

		function cancel() {
			$.each(custom_select, function(key, val) {
				val.selectize.enable();
			});


		}
	</script>