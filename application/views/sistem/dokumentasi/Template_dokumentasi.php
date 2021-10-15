
<div class="col-lg-3">

    <div class="card-header">
    <h3 class="card-title">Petunjuk Penggunaan</h3>
    </div>
	
    <div class="card-body o-auto" style="height: 27rem">
	<ul class="list-unstyled list-separated">	
	<div class="list-group list-group-transparent mb-0">
	
	<a href="<?php echo base_url()?>sistem/Dokumentasi/general" class="list-group-item list-group-item-action <?php if(strtolower($page)=="general"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-flag"></i></span>Introduction</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/system_requirtment" class="list-group-item list-group-item-action <?php if(strtolower($page)=="requirtment"){ echo " active";}?>" ><span class="icon mr-3"><i class="fe fe-alert-triangle"></i></span>System Requirtment</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/pengaturan_menu" class="list-group-item list-group-item-action <?php if(strtolower($page)=="pengaturan_menu"){ echo " active";}?>"><span class="icon mr-3"><i class="fe fe-align-center"></i></span>Pengaturan Menu</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-plus-square"></i></span>Buttons</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-feather"></i></span>Colors</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-image"></i></span>Cards</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-pie-chart"></i></span>Charts</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-check-square"></i></span>Form components</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-tag"></i></span>Tags</a>
	<a href="<?php echo base_url()?>sistem/Dokumentasi/" class="list-group-item list-group-item-action"><span class="icon mr-3"><i class="fe fe-type"></i></span>Typography</a>
	
	</div>				
	</ul>				 
	</div>

</div>


<div class="col-lg-9">
<div class="card">
    <div class="card-header">
    <h3 class="card-title"><?php echo $title_dokumentasi?></h3>
    </div>
	
    <div class="card-body o-auto">
					<div class="media">
                      
                    </div>
					
				<br>
				
				<?php echo $body_dokumentasi?>
				
	</div>

</div>
</div>





				