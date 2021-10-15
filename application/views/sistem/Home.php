
	<div class="col-md-6 col-lg-6">
		<?php echo button_card("Report Consumer Retention & Loyalty", "Menampilkan Report Consumer Retention & Loyalty", 'text-red', 'btn-primary', 'fe fe-bar-chart', 'bg-red', "", site_url() . "Report/Report") ?>
	</div>
	<div class="col-md-6 col-lg-6">
		<?php echo button_card("Dashboard", "Menampilkan Dashboard Realtime Consumer Retention & Loyalty", "text-blue", "btn-info", "fa fa-dashboard", "bg-green", "btn-crud", site_url() . "Dashboard/Dashboard") ?>
	</div>


<script>
	$("#btn-dasboard").click(function() {
		show_success_message("untuk mengaktifkan,tekan icon bintang di samping menu HOME");
	});
</script>