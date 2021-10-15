<?php echo _css('datatables,icheck') ?>

<div class="card-body">
    <div class='box-body table-responsive' id='box-table'>
        <small>
            <table class='display responsive nowrap' id="example" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-size: 12px"><b>No</b></th>
                        <th style="font-size: 12px"><b>Action</b></th>
                        <th style="font-size: 12px"><b>Dok</b></th>
                        <th style="font-size: 12px"><b>Status</b></th>
                        <th style="font-size: 12px"><b>Tanggal Upload</b></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($dok as $datana) {
                    ?>
                        <tr>
                            <td style="font-size: 11px"><?php echo $nomor; ?></td>
                            <td style="font-size: 11px">
                                <?php
                                if ($datana['status'] == 'Sudah Diupload') {
                                ?>
                                    <a href="<?php echo base_url() . 'YbsService/get_dok/' . $datana['file'] ?>" class="btn btn-default text-red btn-sm " title="Download Document" target="_blank"><i class="fa fa-download"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo site_url() . 'Rekruitment/Rekruitment/upload_file/' . $datana['id_dok'] . '/' . $token . "/" . $id_user; ?>" class="btn btn-default text-red btn-sm " title="Upload Document"><i class="fa fa-upload"></i></a>

                                <?php
                                }
                                ?>
                            </td>
                            <td style="font-size: 11px"><?php echo $datana['dok']; ?></td>
                            <td style="font-size: 11px"><?php echo $datana['status']; ?></td>
                            <td style="font-size: 11px"><?php echo $datana['tgl_upload']; ?></td>

                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
                </tbody>
            </table>

            <div hidden>
                <button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modal-danger' id='button_delete_single'></button>
            </div>
        </small>
    </div>

    <?php echo card_close() ?>

    <?php echo _js('datatables,icheck') ?>

    <script>
        var page_version = "1.0.8"
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#example").DataTable({
                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf'
                // ]
            });
        });
    </script>

    <script>
        function deleteItem() {
            if (confirm("anda ingin hapus data ini?")) {
                // your deletion code
            }
            return false;
        }
    </script>
    <script>
        function copyText(element) {
            var range, selection, worked;

            if (document.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }

            try {
                document.execCommand('copy');
                alert('text copied');
            } catch (err) {
                alert('unable to copy text');
            }
        }
    </script>