
<?php echo _css('selectize,datepicker')?>

<div class="row">
<div class="col-lg-6">
<?php echo card_open('Form','bg-green',true)?>	
	
	<form id='form-a'>
	<input hidden class='data-sending' id='id' value='<?php if(isset($id))echo $id?>'>
					<div class='col-md-12 col-xl-12'>				
					<div class='form-group'> 
							<label class='form-label'>SERVICE</label> 
							<?php $v='';  if(isset($data)) $v = $data->id_service; 
								  echo create_cmb_database(array(	'id'			=>'id_service',
																	'name'			=>'id_service',
																	'table'			=>'sys_bot_telegram_service',
																	'field_show'	=>'name',
																	'primary_key'	=>'id', 
																	'selected'		=>$v,
																	'field_link'	=>'',
																	'class'			=>'custom-select data-sending')); 
						    ?> 
					</div>
					</div>		
				
					
				
				
				
	
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'>COMMAND NAME</label>
							<input type='text' class='form-control data-sending focus-color'  id='name' name='name' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->name ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'>DESCRIPTIONS</label>
							<input type='text' class='form-control data-sending focus-color'  id='descriptions' name='descriptions' placeholder='<?php echo $title->general->desc_required ?>' value='<?php if(isset($data)) echo $data->descriptions ?>' >
					</div>
					</div>
			
			
					<div class='col-md-12 col-xl-12'>
					<div class='form-group'>
							<label class='form-label'>OUTPUT MESSAGE</label>
							<textarea type='text' class='form-control bg-dark text-white' rows="10"  id='message' name='message' placeholder='<?php echo $title->general->desc_required ?>' ><?php if(isset($data)) echo $data->message ?></textarea>
					</div>
					</div>
			
	<div id="loader-form" class="dimmer ">
    <div class="loader" style="font-size:10px;padding-top:13px">..loading..</div>
    <div class="dimmer-content">	
	
	<div class='col-md-12 col-xl-12'>
	<div class='form-group'>		
	
	<div class="alert alert-info" role="alert" style="font-size:12px">
	Test Output sebelum di simpan
	
			
	<div class='form-group'> 
							<label class='form-label'>TESTING  :</label> 
							<?php  
								  echo create_cmb_database(array(	'id'			=>'id_bot',
																	'name'			=>'id_bot',
																	'table'			=>'sys_bot_telegram_register',
																	'field_show'	=>'name',
																	'primary_key'	=>'id', 
																	'selected'		=>'',
																	'field_link'	=>'',
																	'class'			=>'custom-select')); 
						    ?> 
								<button id="btn-test" type='button' class='btn btn-success btn-sm'><i class="fa fa-paper-plane"></i> Test</button>	
	</div>

	</div>				
	
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
	
	</div>
	</div>
	</form>


<?php echo card_close()?>
</div>

<div class="col-lg-6">
<?php echo card_open('Petunjuk','bg-info',true)?>	
<div class="alert alert-info" role="alert" style="font-size:12px">
Harap di perhatikan
</div>		
<p style="font-size:12px">		
Command merupakan perintah yang akan di berikan kepada bot telegram anda. ketika penggunaan
telegram mengetik/menekan Command pada BOT anda maka secara otomatis server akan mengirimkan OUTPUT MESSAGE.
</p>					 
<ol style="font-size:12px">
<li>"COMMAND NAME" tidak  boleh menggunakan spasi</li>
<li>"COMMAND NAME" max 20 karakter & huruf kecil</li>
<li>"DESCRIPTIONS" max 100 karakter</li>
<li>"OUTPUT MESSAGE" bertipe html, <br> penulisan hanya  dapat menggunakan tag-tag berikut</li>
<pre>
&lt;b>bold&lt;/b>,
&lt;strong>bold&lt;/strong>
&lt;i>italic&lt;/i>, &lt;em>italic&lt;/em>
&lt;a href="http://www.example.com/">inline URL&lt;/a>
&lt;a href="tg://user?id=123456789">inline mention of a user&lt;/a>
&lt;code>inline fixed-width code&lt;/code>
&lt;pre>pre-formatted fixed-width code block&lt;/pre>
							
Hanya tag yang disebutkan di atas yang didukung saat ini.
Tag tidak boleh bersarang.
Semua <,> dan & simbol yang bukan bagian dari tag atau entitas HTML harus diganti dengan entitas HTML yang sesuai.
</pre>	
							untuk lebih jelasnya dapat melihat link  berikut :
							<a href="https://core.telegram.org/bots/api#html-style">format api telegram </a><br><br>
							contoh penggunaan : <br><br>
							COMMAND NAME 	: <br>
							info_sistem<br>
							<br>
							DESCRIPTIONS	: <br>
							Mengecek Sistem Terbaru<br>
							<br>
							OUTPUT MESSAGE  : <br>
							&lt;b><b>TERIMA KASIH ATAS PERTANYAAN ANDA</b>&lt;/b><br>
							&lt;code> saat ini anda menggunakan ybs sistem 1.0.11 &lt;/code>
					 </ol>
					

<?php echo card_close()?>
</div>


</div>



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
$("#btn-test").click(function(){
	test_output();
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
	
	$("#loader-form").addClass("active");
	
	var data = get_dataSending('form-a');
	
	
	
	<?php
	/* complite json format */
	/* ybs_dataSending(array); */
	?>
	send_data = ybs_dataSending(data);
	
	var msg_val = $("#message").val();
	var pdata = get_post_format("message",msg_val);
	send_data  =  send_data + "&"+pdata;

	var a = new ybsRequest();
	a.process('<?php echo $link_save?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
	
	a.onComplite = function(){
		$("#loader-form").removeClass("active");
	}
}


function test_output(){
	
	$("#loader-form").addClass("active");
	
	var data = get_dataSending('form-a');
	var bot  = get_json_format("id_bot",$("#id_bot").val());
	
	data.push(bot);

	send_data = ybs_dataSending(data);
	
	var msg_val = $("#message").val();
	var pdata = get_post_format("message",msg_val);
	
	
	
	send_data  =  send_data + "&"+pdata;
	
	var a = new ybsRequest();
	a.process('<?php echo $link_test?>',send_data,'POST');
	a.onAfterSuccess = function(){
			cancel();
	}
	a.onBeforeFailed = function(){
			cancel();
	}
	a.onComplite = function(){
		$("#loader-form").removeClass("active");
	}
}

</script>

