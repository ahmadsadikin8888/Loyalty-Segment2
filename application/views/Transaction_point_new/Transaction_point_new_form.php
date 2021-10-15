
<?php echo _css('selectize,datepicker')?>

<?php echo card_open('Form','bg-green',true)?>	
	
	<form id='form-a'>
	<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>
	
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_title_point ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='title_point' name='title_point' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->title_point ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_realname ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='realname' name='realname' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->realname ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_trx_id ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='trx_id' name='trx_id' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->trx_id ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_invoice ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='invoice' name='invoice' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->invoice ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_ncli ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='ncli' name='ncli' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->ncli ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_admin_id ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='admin_id' name='admin_id' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->admin_id ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_merchant_id ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='merchant_id' name='merchant_id' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->merchant_id ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_redeem_key ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='redeem_key' name='redeem_key' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->redeem_key ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_point_id ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='point_id' name='point_id' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->point_id ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_price ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='price' name='price' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->price ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_status ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='status' name='status' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->status ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_create_time ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='create_time' name='create_time' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->create_time ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_update_time ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='update_time' name='update_time' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->update_time ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_expired_time ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='expired_time' name='expired_time' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->expired_time ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_used_time ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='used_time' name='used_time' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->used_time ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_used_merchant ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='used_merchant' name='used_merchant' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->used_merchant ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_kode_merchant ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='kode_merchant' name='kode_merchant' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->kode_merchant ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_used_status ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='used_status' name='used_status' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->used_status ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_msisdn ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='msisdn' name='msisdn' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->msisdn ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_email ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='email' name='email' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->email ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_nd ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='nd' name='nd' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->nd ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_use_otp ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='use_otp' name='use_otp' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->use_otp ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_product_code ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='product_code' name='product_code' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->product_code ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_product_type ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='product_type' name='product_type' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->product_type ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_product_price ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='product_price' name='product_price' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->product_price ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_slcs_data_response ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='slcs_data_response' name='slcs_data_response' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->slcs_data_response ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_slcs_update_time ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='slcs_update_time' name='slcs_update_time' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->slcs_update_time ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'><?php echo $title->transaction_point_new_use_exp ?></label>
							<input type='text' class='form-control data-sending focus-color'  id='use_exp' name='use_exp' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->use_exp ?>' >
					</div>
					</div>
			
							 
	
	<div class='col-md-12 col-xl-12'>

	   <div class='form-group'>
		<button id='btn-apply' type='button' class='btn btn-primary'><i class='fe fe-check'></i> <?php echo $title->general->button_apply ?></button>	
		<button disabled='' id='btn-save' type='button' class='btn btn-primary'><i class="fe fe-save"></i> <?php echo $title->general->button_save ?></button>	
		<button disabled='' id='btn-cancel' type='button' class='btn btn-primary'> <?php echo $title->general->button_cancel ?></button>
		<a href='<?php echo $link_back ?>' id='btn-close' class='btn btn-primary'> <?php echo $title->general->button_close ?></a>
	   </div>
			 
	</div>
	</form>


<?php echo card_close()?>

<?php echo _js('selectize,datepicker')?>

<script>var page_version="1.0.8"</script>

<script> 
var custom_select = $('.custom-select').selectize({}); 	
var custom_select_link = $('.custom-select-link');

$(document).ready(function(){
	<?php
	/*
	|--------------------------------------------------------------
	| CARA MEMBUAT COMBOBOX LINK
	|--------------------------------------------------------------
	| COMBOBOX LINK adalah proses membuat sebuah combobox menjadi 
	| referensi combobox lainnya dalam menampilkan data.
	| misal :
	|  combobox grup menjadi referensi combobox subgrup.
	|  perubahan/pemilihan data combobox grup menyebabkan 
	|  perubahan data combobox subgrup. 
	|--------------------------------------------------------------
	| cara :
	|  - isi "field_link" pada combobox target 
	| 	 'field_link'	=>'nama_field_join_database'.
	|  - gunakan class "custom-select-link" pada kedua combobox ,
	|	 referensi dan target.
	|  - tambahkan script :
	|     linkToSelectize('id_cmb_referensi','id_cmb_target');
	|--------------------------------------------------------------
	| note :
	|   - struktur database harus menggunakan field id sebagai primary key
	|   - combobox harus di buat dengan php code
	|	-  "create_cmb_database" untuk row < 1000
	|	-  dan linkToSelectize untuk row < 1000
	|
	|	-  "create_cmb_database_bigdata" untuk row > 1000
	|	-  dan linkToSelectize_Big untuk row > 1000
	|   - 
	|   - class harus menggunakan "custom-select-link"
	|
	*/
	?>
})

	
$('.data-sending').keydown(function(e){
	remove_message();
	switch(e.which){
		case 13 :
		apply();
		return false;
	}
});

</script>

<script>
$('.input-simple-date').datepicker({ 
		autoclose: true ,
		format:'dd.mm.yyyy',
 })

$('#btn-apply').click(function(){
		apply();
		play_sound_apply();
});

$('#btn-close').click(function(){
	play_sound_apply();
});

$('#btn-cancel').click(function(){
	cancel();
	play_sound_apply();
});

$('#btn-save').click(function(){
	simpan();
})

function apply(){
	$.each(custom_select,function(key,val){
		val.selectize.disable();
	});
	
	<?php 
	// NOTE : FOR DISABLE CUSTOM-SELECT-LINK 
	?>
	// $.each(custom_select_link,function(key,val){
	// 		val.selectize.disable();
	// });
	
	$('.form-control').attr('disabled',true);
	$('#btn-apply').attr('disabled',true);
	$('#btn-cancel').attr('disabled',false);
	$('#btn-save').attr('disabled',false);
	$('#btn-save').focus();
}
function cancel(){
	$.each(custom_select,function(key,val){
		val.selectize.enable();
	});
	<?php 
	// NOTE : FOR ENABLE CUSTOM-SELECT-LINK  
	?>
	// $.each(custom_select_link,function(key,val){
	// 		val.selectize.enable();
	// });
	
	$('.form-control').attr('disabled',false);
	$('#btn-cancel').attr('disabled',true);
	$('#btn-save').attr('disabled',true);
	$('#btn-apply').attr('disabled',false);
	
}


function simpan(){
	<?php
	/* mengambil data yang akan di kirim dari form-a */
	/* dalam bentuk array json tanpa penutup.. */
	/* memungkinkan penambahan data dengan cara push */
	/* ex. data.push */
	?>
	var data = get_dataSending('form-a');
	
	<?php
	/* complite json format */
	/* ybs_dataSending(array); */
	?>
	send_data = ybs_dataSending(data);

	var a = new ybsRequest();
	a.process('<?php echo $link_save?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
}


</script>

