<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../../index.php');
} else {
  include "../../config/library.php";
  include "../../config/koneksi.php";
  include "../..//fungsi_kode.php";
?>

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>e-Dasawisma | Kabupaten Batu Bara</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../../assets/plugins/select2/select2.min.css" rel="stylesheet" />
        <link href="../../assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />
        <link href="../../assets/css/AdminLTE.css" rel="stylesheet" />
        <link href="../../assets/plugins/iCheck/square/blue.css" rel="stylesheet" />
        <link href="../../assets/css/_all-skins.css" rel="stylesheet" />
        <link href="../../assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
        <link href="../../assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="../../assets/css/style.css" rel="stylesheet" />
        <link href="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
        <link href="../../assets/css/icheck/flat/green.css" rel="stylesheet" />
        <script src="../../assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script>

        <script src="../../assets/js/icheck/icheck.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="../../assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet" />
        <script src="../../assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>

        <link rel="icon" ; href="<?php $appurl; ?>favicon.png">


    </head>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<style type="text/css">
    #hidden {
        display: none
    }

    #progress-bar {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #4aa6e7
    }

    #loading {
        position: absolute;
        z-index: 999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #ffffff url(images/spinner/load.gif) center no-repeat
    }
</style>
<div id="hidden">
    <div id="progress-bar"></div>
    <div id="loading"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="../../js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">


    <body class="skin-blue">
        <div class="wrapper">
            <?php include "../../themes/header.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        <div class="box-body">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Dashboard
      <small>Data Real Time e-Dasawisma</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">Dashboard</li>
    </ol>


  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                  <h3 id="totdasawismakec"></h3>
                <?php } ?>
                <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                  <h3 id="totdasawisma"></h3>
                <?php } ?>
                <p>Data Dasawisma</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <?php if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') { ?>
                <a href="appmaster.php?module=dasawisma2" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                  <h3 id="totkrtkec"></h3>
                <?php } ?>
                <p>Data Kepala Rumah Tangga</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
            </div>
          </div>

          <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary col-centered">
                  <div class="inner">
                    <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                      <h3 id="totwargakec"></h3>
                    <?php } ?>
                    <p>Data Warga</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-maroon">
                  <div class="inner">
                    <?php if ($_SESSION['ses_level'] == 'admkec') { ?>
                      <h3 id="totkeluargakec"></h3>
                    <?php } ?>
                    <?php if ($_SESSION['ses_level'] == 'admin'  or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') { ?>
                      <h3 id="totkeluarga"></h3>
                    <?php } ?>
                    <p>Data Keluarga</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                </div>
              </div>

              <!-- ./col -->
            </div>
            <!-- ./col -->
        </div>

    </div><!-- /.row -->
    
  </section><!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">



  </section><!-- /.content -->

                        </div>
                    </div>
                </section>
            </div>
            <?php include "../../themes/footer.php"; ?>
        </div>

  

  
        <!-- jQuery 2.1.4 -->
        <!-- jQuery UI 1.11.4 -->
        <script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/select2/select2.full.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="../../https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="../../assets/js/pages/dashboard.js" type="text/javascript"></script>
        <script src="../../assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../../assets/js/app.js" type="text/javascript"></script>
        <script src="../../assets/js/demo.js" type="text/javascript"></script>
        <script src="../../assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="../../assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="../../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../assets/plugins/validationengine/css/validationEngine.jquery.css" />
        <script src="../../assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
        <script src="../../assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
        <script src="../../assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
        <script src="../../assets/js2/validationInit.js"></script>

</body>
</html>

<?php
}
?>