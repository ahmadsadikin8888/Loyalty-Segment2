<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<head>
    <?php
    if (isset($_GET['start'])) {
    } else {
    ?>
        <!-- <meta http-equiv="refresh" content="300"> -->
    <?php
    }
    function nice_number($n)
    {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' T';
        elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' B';
        elseif ($n > 1000000) return round(($n / 1000000), 2) . ' M';
        elseif ($n > 1000) return $n;

        return number_format($n);
    }

    ?>

    <meta charset="UTF-8">
    <title>Consumer Retention & Loyalty - Dashboard</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logo.png') ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/chartjs/Chart.min.css">
    <link href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/lineprogressbar/jquery.lineProgressbar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css" />

    <!-- END: Page CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/vendors/morris/morris.css">
    <!-- END: Page CSS-->
    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new_theme/dist/css/main.css">
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/chartjs/Chart.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-knob/jquery.knob.min.js" type="text/javascript"></script> -->
    <!-- END: Page CSS-->
    <script src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bundle.js"></script>
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default horizontal-menu">

    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <div class="site-width">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                    <a href="<?php echo base_url(); ?>" class="horizontal-logo text-left">
                        <span class="h6 font-weight-bold align-self-center mb-0 ml-auto"><?php echo  date("h:i A"); ?></span>
                    </a>
                </div>
                <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                    <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                </div>
                <div class="navbar-right ml-auto h-100">

                    <div class="media">
                        <img src="<?php echo base_url(); ?>assets/new_theme/dist/images/logo2.png" alt="" class="d-flex img-fluid mt-1" width="150">
                    </div>

                </div>

            </nav>
        </div>
    </div>
    <!-- END: Header-->
    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <div class="row">
                <div class="col-12  align-self-center">
                    <div class="sub-header py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Consumer Retention & Loyalty Dashboard</h4>
                            <p>Welcome to Dashboard</p>
                        </div>

                        <div class="col-12 col-md-6 col-lg-5" style="text-align:right;">
                            <img style="width:200px;" src="<?php echo base_url("api/Public_Access/get_logo_template") ?>" class="header-brand-img h-<?php echo $this->_appinfo['template_logo_size'] ?>" alt="Infomedia logo">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->
            <div class="row">
                <div class="col-12">

                    <form method="POST" action="#">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <select class="form-control" name="template" id="template">
                                    <option value='monthly' <?php echo ($template == "monthly") ? 'selected' : ''; ?>>Monthly</option>
                                    <option value='weekly' <?php echo ($template == "weekly") ? 'selected' : ''; ?>>Weekly</option>
                                    <option value='daily' <?php echo ($template == "daily") ? 'selected' : ''; ?>>Daily</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input class="form-control" type="date" name="datena" id="datena" value="<?php echo $datena; ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" id="filter" class="btn btn-primary">Filter</button>
                            </div>
                        </div>

                    </form>
                    <br>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12  mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-3 d-block d-md-flex d-lg-block">
                                        <div class="card bg-primary rounded-0 col-12 col-md-4 col-lg-12">
                                            <div class="card-body">
                                                <div class='d-flex px-0 px-lg-2 align-self-center'>
                                                    <i class="fas fa-dollar-sign card-liner-icon mt-2 text-white">
                                                    </i>
                                                    <div class='card-liner-content'>
                                                        <h2 class="card-liner-title text-white"><?php echo number_format($data['trx']['total']['trx']); ?></h2>
                                                        <h6 class="card-liner-subtitle text-white">Redeem Transaction</h6>
                                                        <span class="text-<?php echo $data['trx']['persen']['trx']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['trx']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['trx']['num'], 2) ?>% </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-primary  rounded-0 col-12 col-md-4 col-lg-12">
                                            <div class="card-body">
                                                <div class='d-flex px-0 px-lg-2 align-self-center'>
                                                    <i class="fas fa-donate card-liner-icon mt-2 text-white"></i>
                                                    <div class='card-liner-content'>
                                                        <h2 class="card-liner-title text-white"><?php echo number_format($data['trx']['total']['burn']); ?></h2>
                                                        <h6 class="card-liner-subtitle text-white">Burn Poin</h6>
                                                        <span class="text-<?php echo $data['trx']['persen']['burn']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['burn']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['burn']['num'], 2) ?>% </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-primary  rounded-0 col-12 col-md-4 col-lg-12">
                                            <div class="card-body">
                                                <div class='d-flex px-0 px-lg-2 align-self-center'>
                                                    <i class="fab fa-creative-commons-nc card-liner-icon mt-2 text-white"></i>
                                                    <div class='card-liner-content'>
                                                        <h2 class="card-liner-title text-white"><?php echo number_format($data['trx']['uniq_redeem']); ?></h2>
                                                        <h6 class="card-liner-subtitle text-white">Uniq Customer Redeem</h6>
                                                        <span class="text-<?php echo $data['trx']['persen']['uniq']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['uniq']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['uniq']['num'], 2) ?>% </span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h6 class="card-title">TOP 5 Category</h6>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless pick-table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Category</th>
                                                                    <th class="text-right">Transaction</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (count($data['category']) > 0) {
                                                                    foreach ($data['category'] as $k) {
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $k['text']; ?></td>
                                                                            <td class="text-right"><?php echo $k['num']; ?></td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h6 class="card-title">TOP 5 Merchant</h6>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless pick-table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Merchant</th>
                                                                    <th class="text-right">Transaction</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (count($data['title_point']) > 0) {
                                                                    foreach ($data['title_point'] as $k) {
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $k['text']; ?></td>
                                                                            <td class="text-right"><?php echo $k['num']; ?></td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title">Merchant</h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <ul class="list-group list-unstyled">
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-success my-auto">Active</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold  text-right text-success">
                                                <?php echo $data['merchant']['active']; ?><br>
                                                <small class="d-block">Merchant</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="transaction-date d-flex w-100">
                                            <span class="badge outline-badge-danger my-auto">Not Active/Expired</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                <?php echo $data['merchant']['not_active']; ?><br>
                                                <small class="d-block">Merchant</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-primary my-auto">Total</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-primary">
                                                <?php echo $data['merchant']['total']; ?><br>
                                                <small class="d-block">Merchant</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title">Contract</h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <ul class="list-group list-unstyled">
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-success my-auto">Active</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold  text-right text-success">
                                                <?php echo $data['contract']['active']; ?><br>
                                                <small class="d-block">Contract</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="transaction-date d-flex w-100">
                                            <span class="badge outline-badge-danger my-auto">Not Active/Expired</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                <?php echo $data['contract']['not_active']; ?><br>
                                                <small class="d-block">Contract</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-primary my-auto">Total</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-primary">
                                                <?php echo $data['contract']['total']; ?><br>
                                                <small class="d-block">Contract</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-3">
                    <div class="card overflow-hidden">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title">Voucher</h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body p-0">
                                <ul class="list-group list-unstyled">
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-success my-auto">Used</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold  text-right text-success">
                                                <?php echo number_format($data['voucher']['used']); ?><br>
                                                <small class="d-block">Voucher</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="transaction-date d-flex w-100">
                                            <span class="badge outline-badge-danger my-auto">Expired</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-danger">
                                                <?php echo number_format($data['voucher']['expired']); ?><br>
                                                <small class="d-block">Voucher</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-2 border-bottom zoom">
                                        <div class="media d-flex w-100">
                                            <span class="badge outline-badge-primary my-auto">Total</span>
                                            <div class="ml-auto my-auto pl-4 font-weight-bold text-right text-primary">
                                                <?php echo number_format($data['voucher']['total']); ?><br>
                                                <small class="d-block">Voucher</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 mt-3">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body text-center p-3 d-flex">
                            <div class="align-self-center text-center w-100">
                                <span class="icon-bag icons h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                                <h4 class="card-title font-weight-bold mt-4">Voucher Online</h4>
                                <span class="h4"><?php echo number_format($data['voucher']['online']); ?></span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="card-title">Performance </h6>
                        </div>
                        <div class="card-body" style="height: 400px">
                            <canvas id="chartjs-multiaxis-data"></canvas>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body text-center p-0">
                            <div class="px-4 pt-4 pb-0 d-flex">
                                <i class="fas fa-dollar-sign card-liner-icon font-size-60 mt-2 text-primary"></i>
                                <div class="w-100 text-right">
                                    <h4 class="card-title  m-0">Transaction</h4>
                                    <span class="text-<?php echo $data['trx']['persen']['trx']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['trx']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['trx']['num'], 2) ?>% </span> Transaction</span>
                                </div>
                            </div>
                            <div id="eth_apex_area_chart" class="min-height-auto"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body text-center p-0">
                            <div class="px-4 pt-4 pb-0 d-flex">
                                <i class="fas fa-donate card-liner-icon font-size-60 mt-2 text-success"></i>
                                <div class="w-100 text-right">
                                    <h4 class="card-title  m-0">Burn Poin</h4>
                                    <span class="text-<?php echo $data['trx']['persen']['burn']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['burn']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['burn']['num'], 2) ?>% </span> <span class="text-muted"> Burn Poin</span>
                                </div>
                            </div>
                            <div id="bch_apex_area_chart" class="min-height-auto"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3 mt-3">
                    <div class="card">
                        <div class="card-body text-center p-0">
                            <div class="px-4 pt-4 pb-0 d-flex">
                                <i class="fab fa-creative-commons-nc card-liner-icon mt-2 text-info font-size-60"></i>
                                <div class="w-100 text-right">
                                    <h4 class="card-title  m-0">Unique STATS</h4>
                                    <span class="text-<?php echo $data['trx']['persen']['uniq']['text'] ?>"><i class="ion <?php echo $data['trx']['persen']['uniq']['arrow'] ?>"></i> <?php echo number_format($data['trx']['persen']['uniq']['num'], 2) ?>% </span> <span class="text-muted"> Uniq Redeem</span>
                                </div>
                            </div>
                            <div id="stats_apex_area_chart" class="min-height-auto"></div>
                        </div>
                    </div>
                </div> -->
            </div>

        </div>

    </main>
    <!-- END: Content-->
    <!-- START: Footer-->
    <footer class="site-footer">
        2020 © Sy-ANIDA
    </footer>
    <!-- END: Footer-->



    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>


    <!-- START: Template JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/moment/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/js/app.js"></script>
    <!-- END: APP JS-->



    <!-- START: Page Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/lineprogressbar/jquery.lineProgressbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/lineprogressbar/jquery.barfiller.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page JS-->
    <!-- <script src="<?php echo base_url(); ?>assets/new_theme/dist/js/home.script.js"></script> -->
    <!-- END: Page JS-->

    <!---- START page datatable--->
    <!-- START: Page Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/js/datatable.script.js"></script>
    <!-- END: Page Script JS-->

    <!-- START: Page Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/morris/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/vendors/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/new_theme/dist/js/chartjs-plugin-datalabels.min.js"></script>

    <!---- END page datatable--->
    <!-- START: Page JS-->
    <!-- <script src="<?php echo base_url(); ?>assets/new_theme/dist/js/home.script.js"></script> -->
    <!-- END: Page JS-->
    <!-- END: Back to top-->
    <script type="text/javascript">
        var primarycolor = getComputedStyle(document.body).getPropertyValue('--primarycolor');
        var bordercolor = getComputedStyle(document.body).getPropertyValue('--bordercolor');
        var bodycolor = getComputedStyle(document.body).getPropertyValue('--bodycolor');
        var theme = 'light';
        $(document).ready(function() {


            var barmultiaxisChartData = {
                labels: [
                    <?php
                    if (count($data['trx']['axis']) > 0) {
                        foreach ($data['trx']['axis'] as $r => $v) {
                            echo "'" . $v . "',";
                        }
                    }

                    ?>
                ],
                datasets: [{
                        label: 'Burn Poin',
                        type: 'line',
                        backgroundColor: "#ffc107",
                        borderColor: "#ffc107",
                        fill: false,
                        yAxisID: 'y-axis-2',
                        data: [

                            <?php
                            if (count($data['trx']['trend']) > 0) {
                                foreach ($data['trx']['trend'] as $r) {
                                    echo $r['burn'] . ",";
                                }
                            }

                            ?>
                        ],
                        datalabels: {
                            color: '#FFFFFF',
                            display: true,
                            backgroundColor: '#ffc107',
                            formatter: function(value, ctx) {
                                return value;
                            }
                        }
                    }, {
                        label: 'Transaction',
                        backgroundColor: "#fd7e14",
                        type: 'bar',
                        yAxisID: 'y-axis-1',
                        data: [
                            <?php
                            if (count($data['trx']['trend']) > 0) {
                                foreach ($data['trx']['trend'] as $r) {
                                    echo $r['trx'] . ",";
                                }
                            }

                            ?>
                        ],
                        datalabels: {
                            color: '#FFFFFF',
                            display: true,
                            backgroundColor: '#fd7e14',
                            formatter: function(value, ctx) {
                                return value;
                            }
                        }
                    },
                    {
                        label: 'Uniq Customer',
                        backgroundColor: "#007bff",
                        borderWidth: 1,
                        yAxisID: 'y-axis-1',
                        type: 'bar',
                        data: [
                            <?php
                            if (count($data['trx']['trend']) > 0) {
                                foreach ($data['trx']['trend'] as $r) {
                                    echo $r['uniq'] . ",";
                                }
                            }

                            ?>
                        ],
                        datalabels: {
                            color: '#FFFFFF',
                            display: true,
                            backgroundColor: '#007bff',
                            formatter: function(value, ctx) {
                                return value;
                            }
                        }

                    }, {
                        label: 'Growt Uniq Customer',
                        backgroundColor: "#008000",
                        borderWidth: 1,
                        yAxisID: 'y-axis-1',
                        type: 'bar',
                        data: [
                            <?php
                            if (count($data['trx']['axis']) > 0) {
                                foreach ($data['trx']['axis'] as $r => $v) {
                                    $nm = 0;
                                    if (isset($data['uniq'][$v])) {
                                        $nm = $data['uniq'][$v];
                                    }
                                    echo  $nm . ",";
                                }
                            }

                            ?>
                        ],
                        datalabels: {
                            color: '#FFFFFF',
                            display: true,
                            backgroundColor: '#008000',
                            formatter: function(value, ctx) {
                                return value;
                            }
                        }

                    }
                    // {
                    //     label: 'Uniq Customer Redeem',
                    //     backgroundColor: "#28a745",
                    //     borderWidth: 1,
                    //     yAxisID: 'y-axis-1',
                    //     type: 'bar',
                    //     data: [
                    //         <?php
                                //         if (count($data['trx']['trend']) > 0) {
                                //             foreach ($data['trx']['trend'] as $r) {
                                //                 echo $r['uniq'] . ",";
                                //             }
                                //         }

                                //         
                                ?>
                    //     ],
                    //     datalabels: {
                    //         color: '#FFFFFF',
                    //         display: true,
                    //         backgroundColor: '#28a745',
                    //         formatter: function(value, ctx) {
                    //             return value;
                    //         }
                    //     }
                    // }
                ]

            };

            var chartjs_multiaxis_bar = document.getElementById("chartjs-multiaxis-data");

            if (chartjs_multiaxis_bar) {
                ctx = document.getElementById('chartjs-multiaxis-data').getContext('2d');
                var mixedChart = new Chart(ctx, {
                    type: 'bar',
                    data: barmultiaxisChartData,
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                    display: true,
                                    position: 'right',
                                    id: 'y-axis-2',
                                    ticks: {
                                        suggestedMin: 0
                                    }
                                },
                                {
                                    id: 'y-axis-1',
                                    display: true,
                                    ticks: {
                                        suggestedMin: 0
                                    }
                                }
                            ]
                        }
                    }
                });

            }
        });
    </script>
</body>
<!-- END: Body-->

</html>