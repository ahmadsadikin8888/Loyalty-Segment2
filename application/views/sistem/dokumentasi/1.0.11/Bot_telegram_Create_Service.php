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
	<li><a href="#register-bot">Registrer Bot</a></li>
	<li><a href="#create-service">Create Service</a></li>
	<li><a href="#set-service-command">Set Service command</a></li>
	<li>Run Service</li>
</ul>



<br>
untuk menggunakan <b>ManualResponse</b><br>
anda dapat mengikuti lakukan langkah berikut :
<ul> 
	<li>Registrer Bot</li>
	<li>Set Bot Admin</li>
</ul>

<div style="font-size:10px;color:red">
note : BOT yang telah di register/terdaftar ,tidak perlu di register ulang.
</div>
<br>

<div id="register-bot">
<b>A. REGISTER BOT</b><br>
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

<div id="create-service">
<b>B. CREATE SERVICE</b><br>
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

<div id="set-service-command">
<b>C. SET SERVICE COMMAND</b><br>
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


