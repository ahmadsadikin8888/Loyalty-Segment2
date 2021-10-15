<?php echo _css('datatables,icheck') ?>

<div class="card-body">
    <div class='box-body table-responsive' id='box-table'>
        <small>
            <table class='display responsive nowrap' id="example" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-size: 12px"><b>No</b></th>
                        <th style="font-size: 12px"><b>Action</b></th>
                        <th style="font-size: 12px"><b>Nama</b></th>
                        <th style="font-size: 12px"><b>Email</b></th>
                        <th style="font-size: 12px"><b>Handphone</b></th>
                        <th style="font-size: 12px"><b>Alamat</b></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($data as $datana) {
                    ?>
                        <tr>
                            <td style="font-size: 11px"><?php echo $nomor; ?></td>
                            <td style="font-size: 11px">
                                <a href="<?php echo base_url() . "Rekruitment/Rekruitment/detail/" . $datana['id'] ?>" class="btn btn-default text-red btn-sm " title="Upload Document"><i class="fa fa-upload"></i></a>
                                <a href="<?php echo $link_update . "/" . $datana['id'] ?>" class="btn btn-default text-red btn-sm " title="update"><i class="fa fa-edit"></i></a>
                                <!-- <a href="
							<?php //echo $link_delete . "/" . $datana['idx'] 
                            ?>
							" class="btn btn-default text-red btn-sm" title="delete" onclick="deleteItem(<?php // echo $datana['id']; 
                                                                                                            ?>)"><i class="fa fa-trash"></i></a> -->


                            </td>

                            <td style="font-size: 11px"><?php echo $datana['name']; ?></td>
                            <td style="font-size: 11px"><?php echo $datana['email']; ?></td>
                            <td style="font-size: 11px"><?php echo $datana['phone']; ?></td>
                            <td style="font-size: 11px"><?php echo $datana['address']; ?></td>
                            
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
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf'
                ]
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