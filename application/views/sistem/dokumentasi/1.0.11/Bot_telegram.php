<div style="font-size:14px">
Bot Telegram merupakan fitur yang di sediakan oleh telegram,<br>
untuk keperluan auto chat/mesin penjawab..<br>
yang mana bot ini terhubung dengan service/server yang dimiliki oleh<br>
pihak ketiga/developer.<br><br>
 
pada ybs pengiriman pesan ke telegram di bagi menjadi 2 metode :<br><br>

<b>1. AutoResponse</b><br>
	pesan otomatis akan dikirm ke telegram setelah telegram mengirim <br>
	terlebih dahulu request/perintah/command yang terdaftar.<br><br>
	
<b>2. ManualResponse</b><br>
	pesan dikirim ke telegram <br>
	tanpa harus menunggu request/perintah dari telegram.<br>
	pengiriman pesan di tentukan secara coding oleh programer.<br>	
	
</div>
<br><br>
<div style="font-size:12px;color:red">
pastikan anda telah memiliki bot telegram<br>
jika belum, anda dapat membuat bot telegram<br> 
mengikuti langkah berikut : <a href="<?php echo site_url() ."sistem/dokumentasi_109/create_bot_telegram"?>">Create new Bot</a> 
</div>
<br><br>
<br>
untuk menggunakan <b>AutoResponse</b><br>
anda dapat mengikuti lakukan langkah berikut :
<ul> 
	<li><a href="javascript:void(0)">Registrer Bot</a></li>
	<li><a href="javascript:void(0)">Create Service</a></li>
	<li><a href="javascript:void(0)">Set Service command</a></li>
	<li><a href="javascript:void(0)">Set & Run Service</a></li>
</ul>



<br>
untuk menggunakan <b>ManualResponse</b><br>
anda dapat mengikuti lakukan langkah berikut :
<ul> 
	<li><a href="javascript:void(0)">Registrer Bot</a></li>
	<li><a href="javascript:void(0)">Set Bot Admin</a></li>
	<li><a href="javascript:void(0)">Menggunakan Bot Admin</a></li>
</ul>

<div style="font-size:10px;color:red">
note : BOT yang telah di register/terdaftar ,tidak perlu di register ulang.
</div>
<br>







<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          1. REGISTER BOT
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
								<div id="register-bot">
								
								</div>

								<div class="alert alert-icon alert-success" role="alert">

								  <i class="fe fe-check mr-2" aria-hidden="true"></i>1. Pilih Menu > Sistem

								</div>

								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/1.png" style="border:1px solid black">

								<br>
								<br>
								<br>
								<br>
								<div class="alert alert-icon alert-success" role="alert">
								  <i class="fe fe-check mr-2" aria-hidden="true"></i>2. Pilih Bot Social Manager
								</div>

								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/61.png" style="border:1px solid black">

								<br>
								<br>
								<br>
								<br>
								<div class="alert alert-icon alert-success" role="alert">
								  <i class="fe fe-check mr-2" aria-hidden="true"></i>3. Pilih Register Bot
								</div>

								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/62.png" style="border:1px solid black">

								<br>
								<br>
								<br>
								<br>
								<div class="alert alert-icon alert-success" role="alert">
								  <i class="fe fe-check mr-2" aria-hidden="true"></i>4. Buat Baru
								</div>

								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/63.png" style="border:1px solid black">

								<br>
								<br>
								<br>
								<br>
								<div class="alert alert-icon alert-success" role="alert">
								  <i class="fe fe-check mr-2" aria-hidden="true"></i>5. Input Token Bot
								</div>

								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/64.png" style="border:1px solid black">
								<div style="font-size:14px">
								<br>
								 masukkan token bot anda dan simpan<br>
								jika berhasil anda akan mendapat pesan pada bot baru anda.<br>
								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/67.png" style="border:1px solid black">



								</div>
								<br>
								<br>
								<div style="font-size:14px;color:red" >
								jika anda mendapat pesan ini <br>
								saat menyimpan token bot<br>
								</div>
								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/65.png" style="border:1px solid black">
								<br><br>
								maka buka telegram,kemudian cari bot anda<br>
								<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/66.png" style="border:1px solid black">
								tekan <b>start</b> atau ketik <b>start.</b><br>

								kemudian ulangi langkah 5 diatas.
								 
								<br>
								<br>
								<br>
								<br>
	 
	 
	 </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			  2. CREATE SERVICE
			</button>
		  </h2>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="create-service">
				
				</div>

				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>1 Pilih Create Service > Buat Baru
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/68.png" style="border:1px solid black">

				<br>
				<br>
				<br>
				<br>
				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>2 Masukkan Nama Service Baru
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/69.png" style="border:1px solid black">

				<br>
				<br>
				<br>
				<br>



				<br>
				<br>
				<br>
				<br>
	   
	   </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3. SET SERVICE COMMAND
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     
				<div id="set-service-command">
				
				</div>

				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>1 Pilih Command Bot > Buat Baru
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/70.png" style="border:1px solid black">

				<br>
				<br>
				<br>
				<br>
				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>2 Isi form
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/71.png" style="border:1px solid black">

				<br>
				<br>
				<a href="javascript:void(0)" class="btn btn-success">PENJELASAN FORM COMMAND BOT</a>
				<br><br>
				* pilih service yang telah di buat sebelum nya<br>
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/72.png" style="border:1px solid black">

				<br><br>
				* isi nama command dan description<br>
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/73.png" style="border:1px solid black">
				<br>
				<div style="font-size:14px;color:red" >
				penulisan command name hanya menggunakan huruf dan angka,<br>
				tidak menggunakan spasi dan karakter lain nya termasuk tanda /
				</div>
				<br><br>
				*Contoh command dan descriptions pada bot telegram.<br>
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/74.png" style="border:1px solid black">
				<br>
				<b>command</b> = newbot <br>
				<b>descriptions</b> = create new bot<br>

				<br><br>
				*Test Command sebelum di simpan.<br>
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/75.png" style="border:1px solid black">
				<br>
				<b>output message</b> = pesan yang nantinya akan di kirim ke telegram <br>
				<b>Testing Bot</b> = bot tujuan untuk keperluan testing output message<br><br>
				<div style="font-size:14px;color:red" >
				pastikan output message mengikuti syarat dari bot telegram<br>
				bisa lihat ketentuan di sini <a href="https://core.telegram.org/bots/api#html-style">format html style</a>
				</div>
				<br><br>


	 </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" id="heading4">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
			  4. SET & RUN SERVICE
			</button>
		  </h2>
		</div>
		<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="set-run-service">
				
				</div>

				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>1 Pilih Set & Run Service > Buat Baru
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/76.png" style="border:1px solid black">

				<br>
				<br>
				<br>
				<br>
				<div class="alert alert-icon alert-success" role="alert">
				  <i class="fe fe-check mr-2" aria-hidden="true"></i>2 Pilih Service dan Bot yang terdaftar
				</div>

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/77.png" style="border:1px solid black">
				<br>
				setelah di simpan,tekan tombol tutup untuk melihat daftar service
				<br><br>
			

				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/78.png" style="border:1px solid black">

				<br>
				<br>
				<br>
				<br>
				
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/79.png" style="border:1px solid black"><br>
				<div style="font-size:12px;" >
					<b>update command terbaru</b><br>				
					untuk mengupdate command terbaru anda dapat mengklik tombol tersebut<br>
					maka command akan otomatis di kirim ke bot telegram yang terdaftar pada service<br><br>
					
					jika berhasil anda akan mendapatkan pesan berikut :<br>
					<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/80.png" style="border:1px solid black"><br>
					<br>
					point 1 adalah petunjuk untuk mengupdate command anda pada botfather<br>
					ikuti petunjuk pada poin 1..<br>
					setelah masuk pada menu "Edit Commands"<br>
					paste command seperti gambar di bawah dan tunggu sampai mendapatkan pesan Success
					<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/80a.png" style="border:1px solid black"><br>
					<br>
					setelah mendapatkan pesan success..buka kembali bot anda..anda akan melihat command baru terpasang
					<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/81.png" style="border:1px solid black"><br>
					<br>
					jika command baru belum muncul coba clear/delete chat bot anda terlebih dahulu..
					
				</div>
				
				<br>
				<br>
				<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/82.png" style="border:1px solid black"><br>
				<div style="font-size:12px;" >
					<b>Menjalankan service</b><br>	
				</div>	
				<div style="font-size:12px;color:red" >
				note :service hanya dapat berjalan pada "HTTPS"
				</div>
	   
	   </div>
    </div>
  </div>
  
  
    <div class="card">
    <div class="card-header" id="heading5">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
			  5. SET BOT ADMIN
			</button>
		  </h2>
		</div>
		<div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
		  <div class="card-body">
				<div id="set-bot-admin">
					<div class="alert alert-icon alert-success" role="alert">
					  <i class="fe fe-check mr-2" aria-hidden="true"></i>1 Pilih Set Bot Admin 
					</div>

					<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/83.png" style="border:1px solid black">
						<div style="font-size:12px;" >
						pilih update admin bot untuk di pasangkan pada telegram<br>	
						</div>	
					<br>
					<br>
					<div class="alert alert-icon alert-success" role="alert">
					  <i class="fe fe-check mr-2" aria-hidden="true"></i>2 Pilih Bot Telegram yang terdaftar 
					</div>

					<img class="ybs-image-slider" data-image="bot_telegram" src="<?php echo base_url()?>images/dokumentasi/84.png" style="border:1px solid black">

					<br>
					<br>
					<br>
					<br>
				</div>

	   
	   </div>
    </div>
  </div>
  
      <div class="card">
    <div class="card-header" id="heading6">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
			  6. MENGGUNAKAN BOT ADMIN
			</button>
		  </h2>
		</div>
		<div id="collapse6" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
		  <div class="card-body">
				<div style="font-size:12px;" >
					setelah anda mengeset bot admin , <br>
pada controller anda dapat menggunakan Object dari YbsTelegram<br>
<pre>
//mengirim pesan ke bot "admin 1" 
$this->YbsTelegram->sendMessageToAdmin("halow","admin 1");	
</pre>


<pre>
//mengirim pesan ke bot "admin 1" dan "admin 3" 
$admin = array("admin 1","admin 3");
$this->YbsTelegram->sendMessageToAdmin("halow",$admin);	
</pre>

untuk mengirim emoji icon <br>
anda dapat menggunakan code emoji berikut <a href="https://www.w3schools.com/charsets/ref_emoji_smileys.asp">emoji style html </a>
<pre>
//mengirim emoji
$admin = array("admin 1");
$dec  = "&#";
$hex  = "&#x"; 

//mengirim dengan code Dec
$emoji = $dec . "128514";
$this->YbsTelegram->sendMessageToAdmin($emoji,$admin);	

//mengirim dengan code Hex
$emoji = $hex . "1F60D";
$this->YbsTelegram->sendMessageToAdmin($emoji,$admin);	
</pre>

				</div>

	   
	   </div>
    </div>
  </div>
  
  
</div>
