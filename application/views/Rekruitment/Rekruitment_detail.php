<!-- load css selectize-->
<!-- tempatkan code ini pada top page view-->
<?php echo _css("selectize,multiselect") ?>
<link href="<?php echo base_url(); ?>assets/progress_bar/css/static.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/progress_bar/js/jquery.progresstimer.js"></script>

<script src="<?php echo base_url(); ?>assets/progress_bar/js/static.min.js"></script>

<div class='col-md-12 col-xl-12' id="list_area">
    <div class="loading-progress" style="width:100%;"></div>
</div>
<script type="text/javascript">
var progress = $(".loading-progress").progressTimer({
    timeLimit: 90,
    onFinish: function() {
        // alert('completed!');
    }
});



function update_base_list_area() {
    var start = $("#start").val();
    var end = $("#end").val();
    $.ajax({
        url: "<?php echo base_url() . "Rekruitment/Rekruitment/get_data_list_upload/".$id ?>",
        data: {
            start: start,
            end: end
        },
        methode: "get",
        success: function(response) {
            $("#list_area").html(response);
            progress.progressTimer('complete');
        },
        error: function() {
            progress.progressTimer('error', {
                errorText: 'ERROR!',
                onFinish: function() {
                    alert('There was an error processing your information!');
                }
            });
        }
    });
}

$(document).ready(function() {
    update_base_list_area();
    // update_base_num_hp_email_area();
    // update_base_num_area();
});
</script>

<!-- load library selectize -->
<!-- tempatkan code ini pada akhir code html sebelum masuk tag script-->
<?php echo _js("ybs,selectize,multiselect") ?>
<script type="text/javascript">
$('#agentid').selectize({});
// $('#agentid').multiselect();

var page_version = "1.0.8"
</script>







