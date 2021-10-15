<div class="col-lg-3">

  <div class="card-header">
    <h3 class="card-title">Petunjuk Penggunaan 1.0.9</h3>
  </div>

  <div class="card-body o-auto" style="height: 40rem ;">

    <ul class="list-unstyled list-separated">
      <div class="list-group list-group-transparent mb-0" style=" font-size: 14px;">

        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/general" class="list-group-item list-group-item-action <?php if (strtolower($page) == "general") {
                                                                                                                        echo " active";
                                                                                                                      } ?>"><span class="icon mr-3"><i class="fe fe-flag"></i></span>Introduction</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/system_requirtment" class="list-group-item list-group-item-action <?php if (strtolower($page) == "requirtment") {
                                                                                                                                    echo " active";
                                                                                                                                  } ?>"><span class="icon mr-3"><i class="fe fe-alert-triangle"></i></span>System Requirtment</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/pengaturan_menu" class="list-group-item list-group-item-action <?php if (strtolower($page) == "pengaturan_menu") {
                                                                                                                                echo " active";
                                                                                                                              } ?>"><span class="icon mr-3"><i class="fe fe-align-center"></i></span>Pengaturan Menu</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/pengaturan_template" class="list-group-item list-group-item-action <?php if (strtolower($page) == "pengaturan_template") {
                                                                                                                                    echo " active";
                                                                                                                                  } ?>"><span class="icon mr-3"><i class="fe fe-airplay"></i></span>Pengaturan Template</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/registrasi_form" class="list-group-item list-group-item-action <?php if (strtolower($page) == "registrasi_form") {
                                                                                                                                echo " active";
                                                                                                                              } ?>"><span class="icon mr-3"><i class="fe fe-feather"></i></span>Registrasi Form / URL</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/level_konfigurasi" class="list-group-item list-group-item-action <?php if (strtolower($page) == "level_konfigurasi") {
                                                                                                                                  echo " active";
                                                                                                                                } ?>"><span class="icon mr-3"><i class="fe fe-bar-chart"></i></span>Level Konfigurasi</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/user_konfigurasi" class="list-group-item list-group-item-action <?php if (strtolower($page) == "user_konfigurasi") {
                                                                                                                                  echo " active";
                                                                                                                                } ?>"><span class="icon mr-3"><i class="fe fe-users"></i></span>User Konfigurasi</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/crud_generator" class="list-group-item list-group-item-action <?php if (strtolower($page) == "crud_generator") {
                                                                                                                                echo " active";
                                                                                                                              } ?>"><span class="icon mr-3"><i class="fa fa-american-sign-language-interpreting"></i></span>CRUD Generator</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/error_report" class="list-group-item list-group-item-action <?php if (strtolower($page) == "error_report") {
                                                                                                                              echo " active";
                                                                                                                            } ?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan (Error Report)</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/csrf_protection" class="list-group-item list-group-item-action <?php if (strtolower($page) == "csrf_protection") {
                                                                                                                                echo " active";
                                                                                                                              } ?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan(CSRF Protect)</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/front_end" class="list-group-item list-group-item-action <?php if (strtolower($page) == "front_end") {
                                                                                                                          echo " active";
                                                                                                                        } ?>"><span class="icon mr-3"><i class="fe fe-activity"></i></span>Keamanan(Front End)</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/page_maintenance" class="list-group-item list-group-item-action <?php if (strtolower($page) == "page_maintenance") {
                                                                                                                                  echo " active";
                                                                                                                                } ?>"><span class="icon mr-3"><i class="fe fe-battery-charging"></i></span>Page Maintenance</a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/panduan_form" class="list-group-item list-group-item-action <?php if (strtolower($page) == "panduan_form") {
                                                                                                                              echo " active";
                                                                                                                            } ?>"><span class="icon mr-3"><i class="fe fe-cloud-drizzle"></i></span><span class="tag tag-indigo" style="font-size:10px;cursor:pointer">PANDUAN MEMBUAT FORM</span></a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/panduan_upload_file" class="list-group-item list-group-item-action <?php if (strtolower($page) == "panduan_upload_file") {
                                                                                                                                    echo " active";
                                                                                                                                  } ?>"><span class="icon mr-3"><i class="fe fe-cloud-drizzle"></i></span><span class="tag tag-indigo" style="font-size:10px;cursor:pointer">PANDUAN UPLOAD FILE</span></a>
        <a href="<?php echo base_url() ?>sistem/Dokumentasi_109/bot_telegram" class="list-group-item list-group-item-action <?php if (strtolower($page) == "bot_telegram") {
                                                                                                                              echo " active";
                                                                                                                            } ?>"><span class="icon mr-3"><i class="fa fa-send"></i></span><span class="tag tag-indigo" style="font-size:10px;cursor:pointer">BOT TELEGRAM</span></a>
      </div>
    </ul>
  </div>

</div>


<div class="col-lg-9">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo $title_dokumentasi ?></h3>
    </div>

    <div class="card-body o-auto">
      

      <br>

      <?php echo $body_dokumentasi ?>

    </div>

  </div>
</div>