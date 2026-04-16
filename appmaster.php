<?php
session_start();
error_reporting(0);

if (empty($_SESSION['ses_nama']) and empty($_SESSION['ses_password'])) {
    header('location:404.php');
} else {

    include "config/koneksi.php";
    include "config/library.php";
    include "config/fungsi_kode.php";
?>

    <?php
    $appurl = 'https://dasawisma.batubarakab.go.id/';
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>e-Dasawisma | Kabupaten Batu Bara</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
        <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />
        <link href="assets/css/AdminLTE.css" rel="stylesheet" />
        <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" />
        <link href="assets/css/_all-skins.css" rel="stylesheet" />
        <link href="assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
        <link href="assets/plugins/datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
        <link href="assets/css/icheck/flat/green.css" rel="stylesheet" />
        <script src="assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script>

        <script src="assets/js/icheck/icheck.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet" />
        <script src="assets/plugins/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>

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
    <link href="js/plugins/sweetalert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
    <script>
        $(document).ready(function() {
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.chk-box').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.chk-box').each(function() {
                        this.checked = false;
                    });
                }
            });
        });

        function print_records_rptsipkunjungan() {
            document.frm.action = "appmaster.php?module=lapsipkunjungan";
            document.frm.submit();
        }

        function print_records_rptsipkunjunganthn() {
            document.frm.action = "appmaster.php?module=sipkunjunganthn";
            document.frm.submit();
        }

        function print_records_rptsipkunjungankec() {
            document.frm.action = "appmaster.php?module=lapsipkunjungankec";
            document.frm.submit();
        }

        function print_records_rptsipkunjunganthnkec() {
            document.frm.action = "appmaster.php?module=sipkunjunganthnkec";
            document.frm.submit();
        }

        function print_records_rptsipkunjungankotathn() {
            document.frm.action = "appmaster.php?module=sipkunjungankotathn";
            document.frm.submit();
        }


        function view_records_akseptorkb() {
            document.frm.action = "appmaster.php?module=lihatkb";
            document.frm.submit();
        }

        function update_records_akseptorkb() {
            document.frm.action = "appmaster.php?module=editkb";
            document.frm.submit();
        }

        function delete_records_akseptorkb() {
            document.frm.action = "appmaster.php?module=hapuskb";
            document.frm.submit();
        }

        function update_records_reset() {
            document.frm.action = "appmaster.php?module=editpassword";
            document.frm.submit();
        }

        function delete_records_kec() {
            document.frm.action = "appmaster.php?module=hapuskec";
            document.frm.submit();
        }

        function update_records_kec() {
            document.frm.action = "appmaster.php?module=editkec";
            document.frm.submit();
        }

        function delete_records_kel() {
            document.frm.action = "appmaster.php?module=hapuskel";
            document.frm.submit();
        }

        function update_records_kel() {
            document.frm.action = "appmaster.php?module=editkel";
            document.frm.submit();
        }


        function delete_records_hakakses() {
            document.frm.action = "appmaster.php?module=hapusakses";
            document.frm.submit();
        }

        function update_records_hakakses() {
            document.frm.action = "appmaster.php?module=editakses";
            document.frm.submit();
        }

        function delete_records_tahunaktif() {
            document.frm.action = "appmaster.php?module=hapustahunaktif";
            document.frm.submit();
        }

        function update_records_tahunaktif() {
            document.frm.action = "appmaster.php?module=edittahunaktif";
            document.frm.submit();
        }


        //===============================================


        function update_records_user() {
            document.frm.action = "appmaster.php?module=edituser";
            document.frm.submit();
        }

        function hapus_records_user() {
            document.frm.action = "appmaster.php?module=hapususer";
            document.frm.submit();
        }

        function update_records_userkec() {
            document.frm.action = "appmaster.php?module=edituserkec";
            document.frm.submit();
        }

        function hapus_records_userkec() {
            document.frm.action = "appmaster.php?module=hapususerkec";
            document.frm.submit();
        }

        //===============================================

        function update_records_useradmin() {
            document.frm.action = "appmaster.php?module=edituseradmin";
            document.frm.submit();
        }

        function hapus_records_useradmin() {
            document.frm.action = "appmaster.php?module=hapususeradmin";
            document.frm.submit();
        }

        //===============================================

        function view_records_lingkungan() {
            document.frm.action = "appmaster.php?module=lihatlingkungan";
            document.frm.submit();
        }

        function update_records_lingkungan() {
            document.frm.action = "appmaster.php?module=editlingkungan";
            document.frm.submit();
        }

        function delete_records_lingkungan() {
            document.frm.action = "appmaster.php?module=hapuslingkungan";
            document.frm.submit();
        }
        //===============================================

        function view_records_dasawisma() {
            document.frm.action = "appmaster.php?module=lihatdasawisma";
            document.frm.submit();
        }

        function update_records_dasawisma() {
            document.frm.action = "appmaster.php?module=editdasawisma";
            document.frm.submit();
        }

        function delete_records_dasawisma() {
            document.frm.action = "appmaster.php?module=hapusdasawisma";
            document.frm.submit();
        }
        //===============================================

        function view_records_dasawisma2() {
            document.frm.action = "appmaster.php?module=lihatdasawisma2";
            document.frm.submit();
        }

        function update_records_dasawisma2() {
            document.frm.action = "appmaster.php?module=editdasawisma2";
            document.frm.submit();
        }

        function delete_records_dasawisma2() {
            document.frm.action = "appmaster.php?module=hapusdasawisma2";
            document.frm.submit();
        }
        //===============================================

        function view_records_datarw() {
            document.frm.action = "appmaster.php?module=lihatdatarw";
            document.frm.submit();
        }

        function update_records_datarw() {
            document.frm.action = "appmaster.php?module=editdatarw";
            document.frm.submit();
        }

        function delete_records_datarw() {
            document.frm.action = "appmaster.php?module=hapusdatarw";
            document.frm.submit();
        }

        //===============================================

        function view_records_datart() {
            document.frm.action = "appmaster.php?module=lihatdatart";
            document.frm.submit();
        }

        function update_records_datart() {
            document.frm.action = "appmaster.php?module=editdatart";
            document.frm.submit();
        }

        function delete_records_datart() {
            document.frm.action = "appmaster.php?module=hapusdatart";
            document.frm.submit();
        }

        //===============================================

        function view_records_kriteria() {
            document.frm.action = "appmaster.php?module=lihatkriteria";
            document.frm.submit();
        }

        function update_records_kriteria() {
            document.frm.action = "appmaster.php?module=editkriteria";
            document.frm.submit();
        }

        function delete_records_kriteria() {
            document.frm.action = "appmaster.php?module=hapuskriteria";
            document.frm.submit();
        }

        //===============================================

        function view_records_datawarga() {
            document.frm.action = "appmaster.php?module=lihatdatawarga";
            document.frm.submit();
        }

        function update_records_datawarga() {
            document.frm.action = "appmaster.php?module=editdatawarga";
            document.frm.submit();
        }

        function delete_records_datawarga() {
            document.frm.action = "appmaster.php?module=hapusdatawarga";
            document.frm.submit();
        }

        //===============================================

        function view_records_keluarga() {
            document.frm.action = "appmaster.php?module=lihatkeluarga";
            document.frm.submit();
        }

        function update_records_keluarga() {
            document.frm.action = "appmaster.php?module=editkeluarga";
            document.frm.submit();
        }

        function delete_records_keluarga() {
            document.frm.action = "appmaster.php?module=hapuskeluarga";
            document.frm.submit();
        }

        //===============================================

        function view_records_keluarga2() {
            document.frm.action = "appmaster.php?module=lihatkeluarga2";
            document.frm.submit();
        }

        function update_records_keluarga2() {
            document.frm.action = "appmaster.php?module=editkeluarga2";
            document.frm.submit();
        }

        function delete_records_keluarga2() {
            document.frm.action = "appmaster.php?module=hapuskeluarga2";
            document.frm.submit();
        }


        //===============================================

        function view_records_pekarangan() {
            document.frm.action = "appmaster.php?module=lihatpekarangan";
            document.frm.submit();
        }

        function update_records_pekarangan() {
            document.frm.action = "appmaster.php?module=editpekarangan";
            document.frm.submit();
        }

        function delete_records_pekarangan() {
            document.frm.action = "appmaster.php?module=hapuspekarangan";
            document.frm.submit();
        }

        //===============================================
        function view_records_pekarangan2() {
            document.frm.action = "appmaster.php?module=lihatpekarangan2";
            document.frm.submit();
        }

        function update_records_pekarangan2() {
            document.frm.action = "appmaster.php?module=editpekarangan2";
            document.frm.submit();
        }

        function delete_records_pekarangan2() {
            document.frm.action = "appmaster.php?module=hapuspekarangan2";
            document.frm.submit();
        }

        //===============================================

        function view_records_industri2() {
            document.frm.action = "appmaster.php?module=lihatindustri2";
            document.frm.submit();
        }

        function update_records_industri2() {
            document.frm.action = "appmaster.php?module=editindustri2";
            document.frm.submit();
        }

        function delete_records_industri2() {
            document.frm.action = "appmaster.php?module=hapusindustri2";
            document.frm.submit();
        }

        //===============================================

        function view_records_industri() {
            document.frm.action = "appmaster.php?module=lihatindustri";
            document.frm.submit();
        }

        function update_records_industri() {
            document.frm.action = "appmaster.php?module=editindustri";
            document.frm.submit();
        }

        function delete_records_industri() {
            document.frm.action = "appmaster.php?module=hapusindustri";
            document.frm.submit();
        }

        //===============================================

        function view_records_bumil() {
            document.frm.action = "appmaster.php?module=lihatbumil";
            document.frm.submit();
        }

        function update_records_bumil() {
            document.frm.action = "appmaster.php?module=editbumil";
            document.frm.submit();
        }

        function delete_records_bumil() {
            document.frm.action = "appmaster.php?module=hapusbumil";
            document.frm.submit();
        }

        //===============================================

        function view_records_bumil2() {
            document.frm.action = "appmaster.php?module=lihatbumil2";
            document.frm.submit();
        }

        function update_records_bumil2() {
            document.frm.action = "appmaster.php?module=editbumil2";
            document.frm.submit();
        }

        function delete_records_bumil2() {
            document.frm.action = "appmaster.php?module=hapusbumil2";
            document.frm.submit();
        }


        //===============================================

        function view_records_melahirkan() {
            document.frm.action = "appmaster.php?module=lihatmelahirkan";
            document.frm.submit();
        }

        function update_records_melahirkan() {
            document.frm.action = "appmaster.php?module=editmelahirkan";
            document.frm.submit();
        }

        function delete_records_melahirkan() {
            document.frm.action = "appmaster.php?module=hapusmelahirkan";
            document.frm.submit();
        }

        //===============================================

        function view_records_melahirkan2() {
            document.frm.action = "appmaster.php?module=lihatmelahirkan2";
            document.frm.submit();
        }

        function update_records_melahirkan2() {
            document.frm.action = "appmaster.php?module=editmelahirkan2";
            document.frm.submit();
        }

        function delete_records_melahirkan2() {
            document.frm.action = "appmaster.php?module=hapusmelahirkan2";
            document.frm.submit();
        }

        //===================== 17 Mei 2021 ==========================

        function view_records_ibubayi() {
            document.frm.action = "appmaster.php?module=lihatibubayi";
            document.frm.submit();
        }

        function update_records_ibubayi() {
            document.frm.action = "appmaster.php?module=editibubayi";
            document.frm.submit();
        }

        function delete_records_ibubayi() {
            document.frm.action = "appmaster.php?module=hapusibubayi";
            document.frm.submit();
        }
        //=================================================

        function view_records_bumilmeninggal() {
            document.frm.action = "appmaster.php?module=lihatbumilmeninggal";
            document.frm.submit();
        }

        function update_records_bumilmeninggal() {
            document.frm.action = "appmaster.php?module=editbumilmeninggal";
            document.frm.submit();
        }

        function delete_records_bumilmeninggal() {
            document.frm.action = "appmaster.php?module=hapusbumilmeninggal";
            document.frm.submit();
        }

        //===============================================

        function view_records_warung() {
            document.frm.action = "appmaster.php?module=lihatwarung";
            document.frm.submit();
        }

        function update_records_warung() {
            document.frm.action = "appmaster.php?module=editwarung";
            document.frm.submit();
        }

        function delete_records_warung() {
            document.frm.action = "appmaster.php?module=hapuswarung";
            document.frm.submit();
        }

        //===============================================

        function view_records_warung2() {
            document.frm.action = "appmaster.php?module=lihatwarung2";
            document.frm.submit();
        }

        function update_records_warung2() {
            document.frm.action = "appmaster.php?module=editwarung2";
            document.frm.submit();
        }

        function delete_records_warung2() {
            document.frm.action = "appmaster.php?module=hapuswarung2";
            document.frm.submit();
        }

        //===============================================

        function view_records_koperasi() {
            document.frm.action = "appmaster.php?module=lihatkoperasi";
            document.frm.submit();
        }

        function update_records_koperasi() {
            document.frm.action = "appmaster.php?module=editkoperasi";
            document.frm.submit();
        }

        function delete_records_koperasi() {
            document.frm.action = "appmaster.php?module=hapuskoperasi";
            document.frm.submit();
        }

        //===============================================

        function view_records_koperasi2() {
            document.frm.action = "appmaster.php?module=lihatkoperasi2";
            document.frm.submit();
        }

        function update_records_koperasi2() {
            document.frm.action = "appmaster.php?module=editkoperasi2";
            document.frm.submit();
        }

        function delete_records_koperasi2() {
            document.frm.action = "appmaster.php?module=hapuskoperasi2";
            document.frm.submit();
        }

        //===============================================

        function view_records_tamanbaca() {
            document.frm.action = "appmaster.php?module=lihattamanbaca";
            document.frm.submit();
        }

        function update_records_tamanbaca() {
            document.frm.action = "appmaster.php?module=edittamanbaca";
            document.frm.submit();
        }

        function delete_records_tamanbaca() {
            document.frm.action = "appmaster.php?module=hapustamanbaca";
            document.frm.submit();
        }

        //===============================================

        function view_records_tamanbaca2() {
            document.frm.action = "appmaster.php?module=lihattamanbaca2";
            document.frm.submit();
        }

        function update_records_tamanbaca2() {
            document.frm.action = "appmaster.php?module=edittamanbaca2";
            document.frm.submit();
        }

        function delete_records_tamanbaca2() {
            document.frm.action = "appmaster.php?module=hapustamanbaca2";
            document.frm.submit();
        }

        //===============================================

        function view_records_kejarpaket() {
            document.frm.action = "appmaster.php?module=lihatkejarpaket";
            document.frm.submit();
        }

        function update_records_kejarpaket() {
            document.frm.action = "appmaster.php?module=editkejarpaket";
            document.frm.submit();
        }

        function delete_records_kejarpaket() {
            document.frm.action = "appmaster.php?module=hapuskejarpaket";
            document.frm.submit();
        }

        //===============================================

        function view_records_kejarpaket2() {
            document.frm.action = "appmaster.php?module=lihatkejarpaket2";
            document.frm.submit();
        }

        function update_records_kejarpaket2() {
            document.frm.action = "appmaster.php?module=editkejarpaket2";
            document.frm.submit();
        }

        function delete_records_kejarpaket2() {
            document.frm.action = "appmaster.php?module=hapuskejarpaket2";
            document.frm.submit();
        }

        //===============================================

        function view_records_saranamck() {
            document.frm.action = "appmaster.php?module=lihatsaranamck";
            document.frm.submit();
        }

        function update_records_saranamck() {
            document.frm.action = "appmaster.php?module=editsaranamck";
            document.frm.submit();
        }

        function delete_records_saranamck() {
            document.frm.action = "appmaster.php?module=hapussaranamck";
            document.frm.submit();
        }

        //===============================================

        function view_records_saranamck2() {
            document.frm.action = "appmaster.php?module=lihatsaranamck2";
            document.frm.submit();
        }

        function update_records_saranamck2() {
            document.frm.action = "appmaster.php?module=editsaranamck2";
            document.frm.submit();
        }

        function delete_records_saranamck2() {
            document.frm.action = "appmaster.php?module=hapussaranamck2";
            document.frm.submit();
        }

        //===============================================

        function view_records_penyuluhan() {
            document.frm.action = "appmaster.php?module=lihatpenyuluhan";
            document.frm.submit();
        }

        function update_records_penyuluhan() {
            document.frm.action = "appmaster.php?module=editpenyuluhan";
            document.frm.submit();
        }

        function delete_records_penyuluhan() {
            document.frm.action = "appmaster.php?module=hapuspenyuluhan";
            document.frm.submit();
        }

        //===============================================

        function view_records_penyuluhan2() {
            document.frm.action = "appmaster.php?module=lihatpenyuluhan2";
            document.frm.submit();
        }

        function update_records_penyuluhan2() {
            document.frm.action = "appmaster.php?module=editpenyuluhan2";
            document.frm.submit();
        }

        function delete_records_penyuluhan2() {
            document.frm.action = "appmaster.php?module=hapuspenyuluhan2";
            document.frm.submit();
        }

        //===============================================

        function view_records_binakeluarga() {
            document.frm.action = "appmaster.php?module=lihatbinakeluarga";
            document.frm.submit();
        }

        function update_records_binakeluarga() {
            document.frm.action = "appmaster.php?module=editbinakeluarga";
            document.frm.submit();
        }

        function delete_records_binakeluarga() {
            document.frm.action = "appmaster.php?module=hapusbinakeluarga";
            document.frm.submit();
        }

        //===============================================

        function view_records_binakeluarga2() {
            document.frm.action = "appmaster.php?module=lihatbinakeluarga2";
            document.frm.submit();
        }

        function update_records_binakeluarga2() {
            document.frm.action = "appmaster.php?module=editbinakeluarga2";
            document.frm.submit();
        }

        function delete_records_binakeluarga2() {
            document.frm.action = "appmaster.php?module=hapusbinakeluarga2";
            document.frm.submit();
        }

        //===============================================

        function view_records_gotongroyong() {
            document.frm.action = "appmaster.php?module=lihatgotongroyong";
            document.frm.submit();
        }

        function update_records_gotongroyong() {
            document.frm.action = "appmaster.php?module=editgotongroyong";
            document.frm.submit();
        }

        function delete_records_gotongroyong() {
            document.frm.action = "appmaster.php?module=hapusgotongroyong";
            document.frm.submit();
        }

        //===============================================

        function view_records_gotongroyong2() {
            document.frm.action = "appmaster.php?module=lihatgotongroyong2";
            document.frm.submit();
        }

        function update_records_gotongroyong2() {
            document.frm.action = "appmaster.php?module=editgotongroyong2";
            document.frm.submit();
        }

        function delete_records_gotongroyong2() {
            document.frm.action = "appmaster.php?module=hapusgotongroyong2";
            document.frm.submit();
        }
        //===============================================

        function view_records_posyandu() {
            document.frm.action = "appmaster.php?module=lihatposyandu";
            document.frm.submit();
        }

        function update_records_posyandu() {
            document.frm.action = "appmaster.php?module=editposyandu";
            document.frm.submit();
        }

        function delete_records_posyandu() {
            document.frm.action = "appmaster.php?module=hapusposyandu";
            document.frm.submit();
        }

        //===============================================

        function view_records_posyandu2() {
            document.frm.action = "appmaster.php?module=lihatposyandu2";
            document.frm.submit();
        }

        function update_records_posyandu2() {
            document.frm.action = "appmaster.php?module=editposyandu2";
            document.frm.submit();
        }

        function delete_records_posyandu2() {
            document.frm.action = "appmaster.php?module=hapusposyandu2";
            document.frm.submit();
        }
        //===============================================

        function view_records_pelatihan() {
            document.frm.action = "appmaster.php?module=lihatpelatihan";
            document.frm.submit();
        }

        function update_records_pelatihan() {
            document.frm.action = "appmaster.php?module=editpelatihan";
            document.frm.submit();
        }

        function delete_records_pelatihan() {
            document.frm.action = "appmaster.php?module=hapuspelatihan";
            document.frm.submit();
        }

        //===============================================

        function view_records_pelatihan2() {
            document.frm.action = "appmaster.php?module=lihatpelatihan2";
            document.frm.submit();
        }

        function update_records_pelatihan2() {
            document.frm.action = "appmaster.php?module=editpelatihan2";
            document.frm.submit();
        }

        function delete_records_pelatihan2() {
            document.frm.action = "appmaster.php?module=hapuspelatihan2";
            document.frm.submit();
        }
        //===============================================

        function view_records_rekapiva() {
            document.frm.action = "appmaster.php?module=lihatrekapiva";
            document.frm.submit();
        }

        function update_records_rekapiva() {
            document.frm.action = "appmaster.php?module=editrekapiva";
            document.frm.submit();
        }

        function delete_records_rekapiva() {
            document.frm.action = "appmaster.php?module=hapusrekapiva";
            document.frm.submit();
        }

        //===============================================

        function view_records_evaluasiiva() {
            document.frm.action = "appmaster.php?module=lihatevaluasiiva";
            document.frm.submit();
        }

        function update_records_evaluasiiva() {
            document.frm.action = "appmaster.php?module=editevaluasiiva";
            document.frm.submit();
        }

        function delete_records_evaluasiiva() {
            document.frm.action = "appmaster.php?module=hapusevaluasiiva";
            document.frm.submit();
        }

        //===============================================

        function view_records_satuan() {
            document.frm.action = "appmaster.php?module=lihatsatuan";
            document.frm.submit();
        }

        function update_records_satuan() {
            document.frm.action = "appmaster.php?module=editsatuan";
            document.frm.submit();
        }

        function delete_records_satuan() {
            document.frm.action = "appmaster.php?module=hapussatuan";
            document.frm.submit();
        }
        //===============================================
        function view_records_kategori() {
            document.frm.action = "appmaster.php?module=lihatkategori";
            document.frm.submit();
        }

        function update_records_kategori() {
            document.frm.action = "appmaster.php?module=editkategori";
            document.frm.submit();
        }

        function delete_records_kategori() {
            document.frm.action = "appmaster.php?module=hapuskategori";
            document.frm.submit();
        }
        //===============================================

        //===============================================
        function view_records_pekerjaan() {
            document.frm.action = "appmaster.php?module=lihatpekerjaan";
            document.frm.submit();
        }

        function update_records_pekerjaan() {
            document.frm.action = "appmaster.php?module=editpekerjaan";
            document.frm.submit();
        }

        function delete_records_pekerjaan() {
            document.frm.action = "appmaster.php?module=hapuspekerjaan";
            document.frm.submit();
        }
        //===============================================

        function view_records_mstkeluarga() {
            document.frm.action = "appmaster.php?module=lihatmstkeluarga";
            document.frm.submit();
        }

        function update_records_mstkeluarga() {
            document.frm.action = "appmaster.php?module=editmstkeluarga";
            document.frm.submit();
        }

        function delete_records_mstkeluarga() {
            document.frm.action = "appmaster.php?module=hapusmstkeluarga";
            document.frm.submit();
        }
        //===============================================

        function view_records_sipkunjungan() {
            document.frm.action = "appmaster.php?module=lihatsipkunjungan";
            document.frm.submit();
        }

        function update_records_sipkunjungan() {
            document.frm.action = "appmaster.php?module=editsipkunjungan";
            document.frm.submit();
        }

        function delete_records_sipkunjungan() {
            document.frm.action = "appmaster.php?module=hapussipkunjungan";
            document.frm.submit();
        }
        //===============================================

        //===============================================

        function view_records_sipkunjungan2() {
            document.frm.action = "appmaster.php?module=lihatsipkunjungan2";
            document.frm.submit();
        }

        function update_records_sipkunjungan2() {
            document.frm.action = "appmaster.php?module=editsipkunjungan2";
            document.frm.submit();
        }

        function delete_records_sipkunjungan2() {
            document.frm.action = "appmaster.php?module=hapussipkunjungan2";
            document.frm.submit();
        }
        //===============================================

        //===============================================

        function view_records_sipkegiatan() {
            document.frm.action = "appmaster.php?module=lihatsipkegiatan";
            document.frm.submit();
        }

        function update_records_sipkegiatan() {
            document.frm.action = "appmaster.php?module=editsipkegiatan";
            document.frm.submit();
        }

        function delete_records_sipkegiatan() {
            document.frm.action = "appmaster.php?module=hapussipkegiatan";
            document.frm.submit();
        }
        //===============================================

        //Pembaharuan
        //===============================================

        function view_records_sipkegiatan2() {
            document.frm.action = "appmaster.php?module=lihatsipkegiatan2";
            document.frm.submit();
        }

        function update_records_sipkegiatan2() {
            document.frm.action = "appmaster.php?module=editsipkegiatan2";
            document.frm.submit();
        }

        function delete_records_sipkegiatan2() {
            document.frm.action = "appmaster.php?module=hapussipkegiatan2";
            document.frm.submit();
        }
        //===============================================

        function view_records_mstjabatan() {
            document.frm.action = "appmaster.php?module=lihatmstjabatan";
            document.frm.submit();
        }

        function update_records_mstjabatan() {
            document.frm.action = "appmaster.php?module=editmstjabatan";
            document.frm.submit();
        }

        function delete_records_mstjabatan() {
            document.frm.action = "appmaster.php?module=hapusmstjabatan";
            document.frm.submit();
        }

        //===============================================

        function view_records_mstanggota() {
            document.frm.action = "appmaster.php?module=lihatmstanggota";
            document.frm.submit();
        }

        function update_records_mstanggota() {
            document.frm.action = "appmaster.php?module=editmstanggota";
            document.frm.submit();
        }

        function delete_records_mstanggota() {
            document.frm.action = "appmaster.php?module=hapusmstanggota";
            document.frm.submit();
        }

        function view_records_mstkomoditi() {
            document.frm.action = "appmaster.php?module=lihatmstkomoditi";
            document.frm.submit();
        }

        function update_records_mstkomoditi() {
            document.frm.action = "appmaster.php?module=editmstkomoditi";
            document.frm.submit();
        }

        function delete_records_mstkomoditi() {
            document.frm.action = "appmaster.php?module=hapusmstkomoditi";
            document.frm.submit();
        }

        function view_records_mstpekarangan() {
            document.frm.action = "appmaster.php?module=lihatmstpekarangan";
            document.frm.submit();
        }

        function update_records_mstpekarangan() {
            document.frm.action = "appmaster.php?module=editmstpekarangan";
            document.frm.submit();
        }

        function delete_records_mstpekarangan() {
            document.frm.action = "appmaster.php?module=hapusmstpekarangan";
            document.frm.submit();
        }

        function print_records_rptdasawismakel() {
            document.frm.action = "appmaster.php?module=lapdasawismakel";
            document.frm.submit();
        }

        //Pembaharuan
        function print_records_rptdasawismakota() {
            document.frm.action = "appmaster.php?module=lapdasawismakota";
            document.frm.submit();
        }

        function print_records_rptdasawismakec() {
            document.frm.action = "appmaster.php?module=lapdasawismakec";
            document.frm.submit();
        }



        function print_records_rptdatawargakel() {
            document.frm.action = "appmaster.php?module=lapdatawargakel";
            document.frm.submit();
        }

        //Pembaharuan
        function print_records_rptdatawargakota() {
            document.frm.action = "appmaster.php?module=lapdatawargakota";
            document.frm.submit();
        }

        function print_records_rptdatawargakec() {
            document.frm.action = "appmaster.php?module=lapdatawargakec";
            document.frm.submit();
        }

        //


        function print_records_rptposyandukel() {
            document.frm.action = "appmaster.php?module=lapposyandu";
            document.frm.submit();
        }

        function print_records_rptdatakrtkel() {
            document.frm.action = "appmaster.php?module=lapdatakrtkel";
            document.frm.submit();
        }

        function print_records_rptpelatihankel() {
            document.frm.action = "appmaster.php?module=lappelatihankel";
            document.frm.submit();
        }
        //Pembaharuan
        function print_records_rptpelatihankec() {
            document.frm.action = "appmaster.php?module=lappelatihankec";
            document.frm.submit();
        }

        function print_records_rptpelatihankota() {
            document.frm.action = "appmaster.php?module=lappelatihankota";
            document.frm.submit();
        }

        function print_records_rptkeluargakelds() {
            document.frm.action = "appmaster.php?module=lapkeluargakelds";
            document.frm.submit();
        }

        function print_records_rptkeluargakel() {
            document.frm.action = "appmaster.php?module=lapkeluargakel";
            document.frm.submit();
        }

        function print_records_rekap18a() {
            document.frm.action = "appmaster.php?module=laprekapitulasikel";
            document.frm.submit();
        }
        function print_records_rekap18ads() {
            document.frm.action = "appmaster.php?module=laprekapitulasids";
            document.frm.submit();
        }
        //Pembaharuan
        function print_records_rptkeluargakecds() {
            document.frm.action = "appmaster.php?module=lapkeluargakecds";
            document.frm.submit();
        }

        function print_records_rptkeluargakec() {
            document.frm.action = "appmaster.php?module=lapokeluargakec";
            document.frm.submit();
        }

        function view_records_pendidikan() {
            document.frm.action = "appmaster.php?module=lihatpendidikan";
            document.frm.submit();
        }

        function update_records_pendidikan() {
            document.frm.action = "appmaster.php?module=editpendidikan";
            document.frm.submit();
        }

        function delete_records_pendidikan() {
            document.frm.action = "appmaster.php?module=hapuspendidikan";
            document.frm.submit();
        }

        function view_records_jlhds0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0101list";
            document.frm.submit();
        }

        function view_records_jlhds0102list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0102list";
            document.frm.submit();
        }

        function view_records_jlhds0103list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0103list";
            document.frm.submit();
        }

        function view_records_jlhds0104list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0104list";
            document.frm.submit();
        }

        function view_records_jlhds0105list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0105list";
            document.frm.submit();
        }

        function view_records_jlhds0106list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0106list";
            document.frm.submit();
        }

        function view_records_jlhds0201list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0201list";
            document.frm.submit();
        }

        function view_records_jlhds0202list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0202list";
            document.frm.submit();
        }

        function view_records_jlhds0203list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0203list";
            document.frm.submit();
        }

        function view_records_jlhds0204list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0204list";
            document.frm.submit();
        }

        function view_records_jlhds0205list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0205list";
            document.frm.submit();
        }

        function view_records_jlhds0206list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0206list";
            document.frm.submit();
        }

        function view_records_jlhds0207list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0207list";
            document.frm.submit();
        }

        function view_records_jlhds0301list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0301list";
            document.frm.submit();
        }

        function view_records_jlhds0302list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0302list";
            document.frm.submit();
        }

        function view_records_jlhds0303list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0303list";
            document.frm.submit();
        }

        function view_records_jlhds0304list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0304list";
            document.frm.submit();
        }

        function view_records_jlhds0305list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0305list";
            document.frm.submit();
        }

        function view_records_jlhds0306list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0306list";
            document.frm.submit();
        }

        function view_records_jlhds0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0307list";
            document.frm.submit();
        }

        function view_records_jlhwr0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhwr0307list";
            document.frm.submit();
        }

        function view_records_jlhtb0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhtb0307list";
            document.frm.submit();
        }

        function view_records_jlhkop0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhkop0307list";
            document.frm.submit();
        }

        function delete_records_datakrt() {
            document.frm.action = "appmaster.php?module=hapusdatakrt";
            document.frm.submit();
        }

        function update_records_datakrt() {
            document.frm.action = "appmaster.php?module=editdatakrt";
            document.frm.submit();
        }

        function view_records_datakrt() {
            document.frm.action = "appmaster.php?module=lihatdatakrt";
            document.frm.submit();
        }

        function view_records_jlhds0401list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0401list";
            document.frm.submit();
        }

        function view_records_jlhds0402list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0402list";
            document.frm.submit();
        }

        function view_records_jlhds0403list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0403list";
            document.frm.submit();
        }

        function view_records_jlhds0404list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0404list";
            document.frm.submit();
        }

        function view_records_jlhds0405list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0405list";
            document.frm.submit();
        }

        function view_records_jlhds0406list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0406list";
            document.frm.submit();
        }

        function view_records_jlhds0407list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0407list";
            document.frm.submit();
        }

        function view_records_jlhds0408list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0408list";
            document.frm.submit();
        }

        function view_records_jlhds0409list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0409list";
            document.frm.submit();
        }

        function view_records_jlhds0501list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0501list";
            document.frm.submit();
        }

        function view_records_jlhds0502list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0502list";
            document.frm.submit();
        }

        function view_records_jlhds0503list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0503list";
            document.frm.submit();
        }

        function view_records_jlhds0504list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0504list";
            document.frm.submit();
        }

        function view_records_jlhds0505list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0505list";
            document.frm.submit();
        }

        function view_records_jlhds0506list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0506list";
            document.frm.submit();
        }

        function view_records_jlhds0507list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0507list";
            document.frm.submit();
        }

        function view_records_jlhds0508list() {
            document.frm.action = "appmaster.php?module=lihatjlhds0508list";
            document.frm.submit();
        }




        function view_records_jlhagt0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0101list";
            document.frm.submit();
        }



        function view_records_jlhagt0102list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0102list";
            document.frm.submit();
        }

        function view_records_jlhagt0103list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0103list";
            document.frm.submit();
        }

        function view_records_jlhagt0104list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0104list";
            document.frm.submit();
        }

        function view_records_jlhagt0105list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0105list";
            document.frm.submit();
        }

        function view_records_jlhagt0106list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0106list";
            document.frm.submit();
        }

        function view_records_jlhagt0201list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0201list";
            document.frm.submit();
        }

        function view_records_jlhagt0202list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0202list";
            document.frm.submit();
        }

        function view_records_jlhagt0203list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0203list";
            document.frm.submit();
        }

        function view_records_jlhagt0204list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0204list";
            document.frm.submit();
        }

        function view_records_jlhagt0205list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0205list";
            document.frm.submit();
        }

        function view_records_jlhagt0206list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0206list";
            document.frm.submit();
        }

        function view_records_jlhagt0207list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0207list";
            document.frm.submit();
        }

        function view_records_jlhagt0301list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0301list";
            document.frm.submit();
        }

        function view_records_jlhagt0302list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0302list";
            document.frm.submit();
        }

        function view_records_jlhagt0303list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0303list";
            document.frm.submit();
        }

        function view_records_jlhagt0304list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0304list";
            document.frm.submit();
        }

        function view_records_jlhagt0305list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0305list";
            document.frm.submit();
        }

        function view_records_jlhagt0306list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0306list";
            document.frm.submit();
        }

        function view_records_jlhagt0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0307list";
            document.frm.submit();
        }

        function view_records_jlhagt0401list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0401list";
            document.frm.submit();
        }

        function view_records_jlhagt0402list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0402list";
            document.frm.submit();
        }

        function view_records_jlhagt0403list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0403list";
            document.frm.submit();
        }

        function view_records_jlhagt0404list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0404list";
            document.frm.submit();
        }

        function view_records_jlhagt0405list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0405list";
            document.frm.submit();
        }

        function view_records_jlhagt0406list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0406list";
            document.frm.submit();
        }

        function view_records_jlhagt0407list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0407list";
            document.frm.submit();
        }

        function view_records_jlhagt0408list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0408list";
            document.frm.submit();
        }

        function view_records_jlhagt0409list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0409list";
            document.frm.submit();
        }

        function view_records_jlhagt0501list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0501list";
            document.frm.submit();
        }

        function view_records_jlhagt0502list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0502list";
            document.frm.submit();
        }

        function view_records_jlhagt0503list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0503list";
            document.frm.submit();
        }

        function view_records_jlhagt0504list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0504list";
            document.frm.submit();
        }

        function view_records_jlhagt0505list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0505list";
            document.frm.submit();
        }

        function view_records_jlhagt0506list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0506list";
            document.frm.submit();
        }

        function view_records_jlhagt0507list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0507list";
            document.frm.submit();
        }

        function view_records_jlhagt0508list() {
            document.frm.action = "appmaster.php?module=lihatjlhagt0508list";
            document.frm.submit();
        }

        function view_records_jlhklg0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0101list";
            document.frm.submit();
        }

        function view_records_jlhklg0102list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0102list";
            document.frm.submit();
        }

        function view_records_jlhklg0103list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0103list";
            document.frm.submit();
        }

        function view_records_jlhklg0104list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0104list";
            document.frm.submit();
        }

        function view_records_jlhklg0105list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0105list";
            document.frm.submit();
        }

        function view_records_jlhklg0106list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0106list";
            document.frm.submit();
        }

        function view_records_jlhklg0201list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0201list";
            document.frm.submit();
        }

        function view_records_jlhklg0202list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0202list";
            document.frm.submit();
        }

        function view_records_jlhklg0203list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0203list";
            document.frm.submit();
        }

        function view_records_jlhklg0204list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0204list";
            document.frm.submit();
        }

        function view_records_jlhklg0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhklg0307list";
            document.frm.submit();
        }

        function view_records_jlhbalita0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0101list";
            document.frm.submit();
        }

        function view_records_jlhbalita0102list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0102list";
            document.frm.submit();
        }

        function view_records_jlhbalita0103list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0103list";
            document.frm.submit();
        }

        function view_records_jlhbalita0104list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0104list";
            document.frm.submit();
        }

        function view_records_jlhbalita0105list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0105list";
            document.frm.submit();
        }

        function view_records_jlhbalita0106list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0106list";
            document.frm.submit();
        }

        function view_records_jlhbalita0201list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0201list";
            document.frm.submit();
        }

        function view_records_jlhbalita0202list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0202list";
            document.frm.submit();
        }

        function view_records_jlhbalita0203list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0203list";
            document.frm.submit();
        }

        function view_records_jlhbalita0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhbalita0307list";
            document.frm.submit();
        }


        function view_records_jlhpus0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhpus0101list";
            document.frm.submit();
        }

        function view_records_jlhpus0102list() {
            document.frm.action = "appmaster.php?module=lihatjlhpus0102list";
            document.frm.submit();
        }

        function view_records_jlhpus0103list() {
            document.frm.action = "appmaster.php?module=lihatjlhpus0103list";
            document.frm.submit();
        }

        function view_records_jlhpus0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhpus0307list";
            document.frm.submit();
        }

        function view_records_jlhwus0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhwus0307list";
            document.frm.submit();
        }

        function view_records_jlhbumil0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhbumil0307list";
            document.frm.submit();
        }

        function view_records_jlhlansia0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhlansia0307list";
            document.frm.submit();
        }

        function view_records_jlh3buta0307list() {
            document.frm.action = "appmaster.php?module=lihatjlh3buta0307list";
            document.frm.submit();
        }

        function view_records_jlhsusu0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhsusu0307list";
            document.frm.submit();
        }

        function view_records_jlhjamban0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhjamban0307list";
            document.frm.submit();
        }

        function view_records_jlhsehat0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhsehat0307list";
            document.frm.submit();
        }

        function view_records_jlhnosehat0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhnosehat0307list";
            document.frm.submit();
        }

        function view_records_jlhmelahirkan0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhmelahirkan0307list";
            document.frm.submit();
        }

        function view_records_jlhnifas0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhnifas0307list";
            document.frm.submit();
        }

        function view_records_jlhmeninggal0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhmeninggal0307list";
            document.frm.submit();
        }

        function view_records_jlhlahirlk0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhlahirlk0307list";
            document.frm.submit();
        }

        function view_records_jlhkk0101list() {
            document.frm.action = "appmaster.php?module=lihatjlhkk0101list";
            document.frm.submit();
        }

        function view_records_jlhkk0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhkk0307list";
            document.frm.submit();
        }

        function view_records_kehamilan() {
            document.frm.action = "appmaster.php?module=lihatkehamilan";
            document.frm.submit();
        }

        function update_records_kehamilan() {
            document.frm.action = "appmaster.php?module=editkehamilan";
            document.frm.submit();
        }

        function delete_records_kehamilan() {
            document.frm.action = "appmaster.php?module=hapuskehamilan";
            document.frm.submit();
        }

        function view_records_jlhibuhamil0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhibuhamil0307list";
            document.frm.submit();
        }

        function view_records_jlhibuhamil0307list() {
            document.frm.action = "appmaster.php?module=lihatjlhibuhamil0307list";
            document.frm.submit();
        }

        function print_records_rptcatkeluargakel() {
            document.frm.action = "appmaster.php?module=lapkeluarga";
            document.frm.submit();
        }

        function print_records_rptcatkeluargads() {
            document.frm.action = "appmaster.php?module=lapkeluargads";
            document.frm.submit();
        }


        //Pembaharuan
        function print_records_rptcatkeluargakel2() {
            document.frm.action = "appmaster.php?module=lapkeluarga2";
            document.frm.submit();
        }

        function print_records_rptcatkeluargakec() {
            document.frm.action = "appmaster.php?module=lapkeluargakec";
            document.frm.submit();
        }

        function print_records_rptwarungkel() {
            document.frm.action = "appmaster.php?module=lapwarungkel";
            document.frm.submit();
        }
        //Pembaharuan
        function print_records_rptwarungkota() {
            document.frm.action = "appmaster.php?module=lapwarungkota";
            document.frm.submit();
        }

        function print_records_rptwarungkec() {
            document.frm.action = "appmaster.php?module=lapwarungkec";
            document.frm.submit();
        }

        function view_records_jlhpos0307list() {
            document.frm.action = "appmaster.php?module=lihat_jlhposyandu0307list";
            document.frm.submit();
        }

        function print_records_rptkoperasikel() {
            document.frm.action = "appmaster.php?module=lapkoperasikel";
            document.frm.submit();
        }
        //Pembaharuan
        function print_records_rptkoperasikec() {
            document.frm.action = "appmaster.php?module=lapkoperasikec";
            document.frm.submit();
        }

        function print_records_rptkoperasikota() {
            document.frm.action = "appmaster.php?module=lapkoperasikota";
            document.frm.submit();
        }
        //
        function print_records_rpttamanbacakel() {
            document.frm.action = "appmaster.php?module=laptamanbacakel";
            document.frm.submit();
        }
        //Pembaharuan
        function print_records_rpttamanbacakec() {
            document.frm.action = "appmaster.php?module=laptamanbacakec";
            document.frm.submit();
        }

        function print_records_rpttamanbacakota() {
            document.frm.action = "appmaster.php?module=laptamanbacakota";
            document.frm.submit();
        }

        function print_records_rptposyandukota() {
            document.frm.action = "appmaster.php?module=laprptposyandukota";
            document.frm.submit();
        }

        function print_records_rptposyandukel() {
            document.frm.action = "appmaster.php?module=lapposyandukel";
            document.frm.submit();
        }

        function print_records_rptposyandukec() {
            document.frm.action = "appmaster.php?module=lapposyandukec";
            document.frm.submit();
        }

        function delete_records_bantuan() {
            document.frm.action = "appmaster.php?module=hapusbantuan";
            document.frm.submit();
        }
        function update_records_bantuan() {
            document.frm.action = "appmaster.php?module=editbantuan";
            document.frm.submit();
        }
        function view_records_bantuan() {
            document.frm.action = "appmaster.php?module=lihatbantuan";
            document.frm.submit();
        }
        function delete_records_bangunan() {
            document.frm.action = "appmaster.php?module=hapusbangunan";
            document.frm.submit();
        }
        function update_records_bangunan() {
            document.frm.action = "appmaster.php?module=editbangunan";
            document.frm.submit();
        }
        function view_records_bangunan() {
            document.frm.action = "appmaster.php?module=lihatbangunan";
            document.frm.submit();
        }
        function delete_records_mobiler() {
            document.frm.action = "appmaster.php?module=hapusmobiler";
            document.frm.submit();
        }
        function update_records_mobiler() {
            document.frm.action = "appmaster.php?module=editmobiler";
            document.frm.submit();
        }
        function view_records_mobiler() {
            document.frm.action = "appmaster.php?module=lihatmobiler";
            document.frm.submit();
        }
        function delete_records_mesin() {
            document.frm.action = "appmaster.php?module=hapusmesin";
            document.frm.submit();
        }
        function update_records_mesin() {
            document.frm.action = "appmaster.php?module=editmesin";
            document.frm.submit();
        }
        function view_records_mesin() {
            document.frm.action = "appmaster.php?module=lihatmesin";
            document.frm.submit();
        }

    </script><!-- akhir cekbox -->

    <script>
        function FormatCurrency(objNum) {
            var num = objNum.value
            var ent, dec;
            if (num != '' && num != objNum.oldvalue) {
                num = HapusTitik(num);
                if (isNaN(num)) {
                    objNum.value = (objNum.oldvalue) ? objNum.oldvalue : '';
                } else {
                    var ev = (navigator.appName.indexOf('Netscape') != -1) ? Event : event;
                    if (ev.keyCode == 190 || !isNaN(num.split('.')[1])) {
                        alert(num.split('.')[1]);
                        objNum.value = TambahTitik(num.split('.')[0]) + '.' + num.split('.')[1];
                    } else {
                        objNum.value = TambahTitik(num.split('.')[0]);
                    }
                    objNum.oldvalue = objNum.value;
                }
            }
        }

        function HapusTitik(num) {
            return (num.replace(/\./g, ''));
        }

        function TambahTitik(num) {
            numArr = new String(num).split('').reverse();
            for (i = 3; i < numArr.length; i += 3) {
                numArr[i] += '.';
            }
            return numArr.reverse().join('');
        }

        function formatCurrency(num) {
            num = num.toString().replace(/\$|\./g, '');
            if (isNaN(num))
                num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num0;
            num = Math.floor(num / 100).toString();
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
                num = num.substring(0, num.length - (4 * i + 3)) + '.' +
                num.substring(num.length - (4 * i + 3));
            return (((sign) ? '' : '-') + num);
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        //foto Warga
        function readURLfotowarga(input) { // Mulai membaca inputan gambar
            if (input.files && input.files[0]) {
                var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

                reader.onload = function(e) { // Mulai pembacaan file
                    $('#preview_gambarwarga') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                        .attr('src', e.target.result)
                        .width(150); // Menentukan lebar gambar preview (dalam pixel)
                    //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "themes/header.php"; ?>
            <?php include "themes/menu.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        <div class="box-body">
                            <?php include "isi_halaman.php"; ?>
                        </div>
                    </div>
                </section>
            </div>
            <?php include "themes/footer.php"; ?>
        </div>

        <!-- jQuery 2.1.4 -->
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/select2/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="assets/js/app.js" type="text/javascript"></script>
        <script src="assets/js/demo.js" type="text/javascript"></script>
        <script src="assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="assets/plugins/validationengine/css/validationEngine.jquery.css" />
        <script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
        <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
        <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
        <script src="assets/js2/validationInit.js"></script>
        <script>
            $(function() {
                formValidation();
            });
        </script>

        <script>
            $(function() {
                // $("#example1").DataTable(); // disabled - using PHP pagination
                $("#example3").DataTable();
                $("#example4").DataTable();
                $("#example7").DataTable();
                $("#example8").DataTable();
                $("#example9").DataTable();
                $("#example10").DataTable();
                $("#example11").DataTable();
                $("#example12").DataTable();
                $("#example16").DataTable();
                $("#example18").DataTable();
                $("#example19").DataTable();
                $("#example20").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
                $('#example13').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>

        <script>
            // DataTables untuk example20 (datawarga2) tidak digunakan lagi karena datawarga menggunakan server-side rendering
        </script>



        <script>
            // DataTables untuk example21 tidak digunakan lagi karena datakrt menggunakan server-side rendering seperti dasawisma
        </script>

        <script>
            // DataTables untuk example22 tidak digunakan lagi karena datawarga menggunakan server-side rendering seperti dasawisma
        </script>

        <script>
            $(document).ready(function() {
                var t = $('#example23').DataTable({
                    "ajax": "ajax/keluarga.php",
                    "order": [
                        [2, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },

                        {
                            "data": "nokk",
                            "width": "70px",
                        },
                        {
                            "data": "nokrt",
                            "width": "70px",
                        },

                        {
                            "data": "namakk",
                            "width": "80px",
                        },

                        {
                            "data": "dasawisma",
                            "width": "200px",
                        },

                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },

                        {
                            "data": "kelurahan",
                            "width": "80px",
                        },

                        {
                            "data": "kecamatan",
                            "width": "80px",
                        }
                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>

        <script>
            $(document).ready(function() {
                var t = $('#example24').DataTable({
                    "ajax": "ajax/rptdatawargakel.php",
                    "order": [
                        [3, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },

                        {
                            "data": "tgldaftar",
                            "width": "70px",
                        },
                        {
                            "data": "noreg",
                            "width": "70px",
                        },
                        {
                            "data": "nokrt",
                            "width": "80px",
                        },

                        {
                            "data": "namakrt",
                            "width": "80px",
                        },

                        {
                            "data": "nokk",
                            "width": "200px",
                        },

                        {
                            "data": "nik",
                            "width": "80px",
                        },

                        {
                            "data": "nama",
                            "width": "80px",
                        },
                        {
                            "data": "tempat",
                            "width": "80px",
                        },

                        {
                            "data": "tgllahir",
                            "width": "80px",
                        },

                        {
                            "data": "jenkel",
                            "width": "80px",
                        },

                        {
                            "data": "alamat_domisili",
                            "width": "80px",
                        },

                        {
                            "data": "alamat_ktp",
                            "width": "80px",
                        },

                        {
                            "data": "dasawisma",
                            "width": "80px",
                        },
                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },
                        {
                            "data": "kelurahan",
                            "width": "80px",
                        },


                        {
                            "data": "kecamatan",
                            "width": "80px",
                        }


                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>

        <script>
            $(document).ready(function() {
                var t = $('#example25').DataTable({
                    "ajax": "ajax/rptposyandu.php",
                    "order": [
                        [2, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },

                        {
                            "data": "namaposyandu",
                            "width": "70px",
                        },
                        {
                            "data": "alamatposyandu",
                            "width": "70px",
                        },

                        {
                            "data": "nosklurah",
                            "width": "70px",
                        },

                        {
                            "data": "jlhkader",
                            "width": "80px",
                        },

                        {
                            "data": "jenis",
                            "width": "200px",
                        },

                        {
                            "data": "namakader",
                            "width": "80px",
                        },

                        {
                            "data": "dasawisma",
                            "width": "80px",
                        },

                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },

                        {
                            "data": "balokskdn",
                            "width": "80px",
                        },

                        {
                            "data": "meja",
                            "width": "80px",
                        },

                        {
                            "data": "kursi",
                            "width": "80px",
                        },

                        {
                            "data": "gantung",
                            "width": "80px",
                        },

                        {
                            "data": "berdiri",
                            "width": "80px",
                        },

                        {
                            "data": "kepala",
                            "width": "80px",
                        },

                        {
                            "data": "ape",
                            "width": "80px",
                        },

                        {
                            "data": "lemari",
                            "width": "80px",
                        },

                        {
                            "data": "sound",
                            "width": "80px",
                        },

                        {
                            "data": "tikar",
                            "width": "80px",
                        },

                        {
                            "data": "pojokasi",
                            "width": "80px",
                        },

                        {
                            "data": "pmt",
                            "width": "80px",
                        },

                        {
                            "data": "seragam",
                            "width": "80px",
                        },

                        {
                            "data": "tinggibadan",
                            "width": "80px",
                        }
                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>
        <script>
            $(document).ready(function() {
                var t = $('#example26').DataTable({
                    "ajax": "ajax/rptdatawargakota.php",
                    "order": [
                        [3, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },

                        {
                            "data": "noreg",
                            "width": "70px",
                        },
                        {
                            "data": "nik",
                            "width": "70px",
                        },

                        {
                            "data": "nokk",
                            "width": "80px",
                        },

                        {
                            "data": "nama",
                            "width": "200px",
                        },

                        {
                            "data": "tempat",
                            "width": "80px",
                        },

                        {
                            "data": "tgllahir",
                            "width": "80px",
                        },

                        {
                            "data": "jenkel",
                            "width": "80px",
                        },

                        {
                            "data": "alamat",
                            "width": "80px",
                        },

                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },

                        {
                            "data": "dasawisma",
                            "width": "80px",
                        },

                        {
                            "data": "pekerjaan",
                            "width": "80px",
                        },

                        {
                            "data": "kriteria",
                            "width": "80px",
                        }

                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>

        <script>
            $(document).ready(function() {
                var t = $('#example27').DataTable({
                    "ajax": "ajax/rptdatawargakec.php",
                    "order": [
                        [3, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },
                        {
                            "data": "tgldaftar",
                            "width": "70px",
                        },

                        {
                            "data": "noreg",
                            "width": "70px",
                        },
                        {
                            "data": "nokrt",
                            "width": "80px",
                        },

                        {
                            "data": "namakrt",
                            "width": "80px",
                        },
                        {
                            "data": "nokk",
                            "width": "80px",
                        },
                        {
                            "data": "nik",
                            "width": "70px",
                        },


                        {
                            "data": "nama",
                            "width": "200px",
                        },

                        {
                            "data": "tempat",
                            "width": "80px",
                        },

                        {
                            "data": "tgllahir",
                            "width": "80px",
                        },

                        {
                            "data": "jenkel",
                            "width": "80px",
                        },

                        {
                            "data": "alamat_domisili",
                            "width": "80px",
                        },
                        {
                            "data": "alamat_ktp",
                            "width": "80px",
                        },
                        {
                            "data": "kelurahan",
                            "width": "80px",
                        },
                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },
                        {
                            "data": "dasawisma",
                            "width": "80px",
                        }

                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>


<script>
            $(document).ready(function() {
                var t = $('#example28').DataTable({
                    "ajax": "ajax/bantuan.php",
                    "order": [
                        [3, 'desc']
                    ],
                    "columns": [

                        {
                            "data": "id",
                            "width": "10px",
                            "sClass": "text-center",
                            "orderable": false,
                            "mRender": function(data) {
                                return '<input  type="checkbox" name="chk[]" class="chk-box" value=' + data + '>';
                            }
                        },
                        {
                            "data": null,
                            "width": "20px",
                            "sClass": "text-center",
                            "orderable": true,
                        },

                        {
                            "data": "tglentry",
                            "width": "70px",
                        },
                        {
                            "data": "nokk",
                            "width": "70px",
                        },
                        {
                            "data": "nama",
                            "width": "80px",
                        },
                        {
                            "data": "nama_dasawisma",
                            "width": "80px",
                        },

                        {
                            "data": "lingkungan",
                            "width": "80px",
                        },

                        {
                            "data": "kelurahan",
                            "width": "200px",
                        },

                        {
                            "data": "kecamatan",
                            "width": "80px",
                        },
                        {
                            "data": "dtks",
                            "width": "80px",
                        },
                        {
                            "data": "nondtks",
                            "width": "80px",
                        },
                        {
                            "data": "pbnt",
                            "width": "80px",
                        },
                        {
                            "data": "jps_provinsi",
                            "width": "80px",
                        },
                        {
                            "data": "blt_dd",
                            "width": "80px",
                        },
                        {
                            "data": "pkh",
                            "width": "80px",
                        },
                        {
                            "data": "bst",
                            "width": "80px",
                        },
                        {
                            "data": "pmks",
                            "width": "80px",
                        },
                        {
                            "data": "pbi",
                            "width": "80px",
                        },
                        {
                            "data": "lainnya",
                            "width": "80px",
                        },
                    ]
                });
                t.on('order.dt search.dt', function() {
                    t.column(1, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            });
        </script>


        <script>
            $(function() {
                //Date range picker
                $('#reservation').daterangepicker();

                $(".select2").select2();

                $("#compose-textarea").wysihtml5();

                // Only initialize CKEditor if the element exists
                if (document.getElementById('editor3')) {
                    CKEDITOR.replace('editor3');
                }

                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>

        <script>
            $(function() {
                $("#tanggal").datepicker();

            });
        </script>
        <script type="text/javascript" src="js/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                "use strict";

                $('.btn-message').click(function() {
                    swal("Here's a message!");
                });

                $('.btn-title-text').click(function() {
                    swal("Here's a message!", "It's pretty, isn't it?")
                });
                $('.btn-success').click(function(e) {
                    swal("Riwat Pendidikan Berhasil disimpan");
                });

                $('.btn-warning-confirm').click(function() {
                    swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this imaginary file!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes, delete it!',
                            closeOnConfirm: false
                        },
                        function() {
                            swal("Deleted!", "Your imaginary file has been deleted!", "success");
                        });
                });

                $('.btn-warning-cancel').click(function(e) {
                    var href = $(this).attr('href');
                    swal({
                            title: "Apakah Anda Yakin?",

                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Ya',
                            cancelButtonText: "Tidak",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                window.location.href = href;
                            }
                            swal("");
                        });
                    return false;
                });

                $('.btn-custom-icon').click(function() {
                    swal({
                        title: "Sweet!",
                        text: "Here's a custom image.",
                        imageUrl: 'images/favicon/apple-touch-icon-152x152.png'
                    });
                });

                $('.btn-message-html').click(function() {
                    swal({
                        title: "HTML <small>Title</small>!",
                        text: 'A custom <span style="color:#F8BB86">html<span> message.',
                        html: true
                    });
                });

                $('.btn-input').click(function() {
                    swal({
                            title: "An input!",
                            text: 'Write something interesting:',
                            type: 'input',
                            showCancelButton: true,
                            closeOnConfirm: false,
                            animation: "slide-from-top",
                            inputPlaceholder: "Write something",
                        },
                        function(inputValue) {
                            if (inputValue === false) return false;

                            if (inputValue === "") {
                                swal.showInputError("You need to write something!");
                                return false;
                            }

                            swal("Nice!", 'You wrote: ' + inputValue, "success");

                        });
                });

                $('.btn-theme').click(function() {
                    swal({
                        title: "Themes!",
                        text: "Here's the Twitter theme for SweetAlert!",
                        confirmButtonText: "Cool!",
                        customClass: 'twitter'
                    });
                });

                $('.btn-ajax').click(function() {
                    swal({
                        title: 'Ajax request example',
                        text: 'Submit to run ajax request',
                        type: 'info',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function() {
                        setTimeout(function() {
                            swal('Ajax request finished!');
                        }, 2000);
                    });
                });

            });
        </script>


        <script>
            $(document).on('click', '.pilih1', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_kel").value = $(this).attr('data-nama_kel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("nama_kec").value = $(this).attr('data-nama_kec');
                document.getElementById("nama_lurah").value = $(this).attr('data-nama_lurah');
                $('#myModal1').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih2', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("nama_kec").value = $(this).attr('data-nama_kec');

                $('#myModal2').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih3', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("nama").value = $(this).attr('data-nama');

                $('#myModal3').modal('hide');
            });
        </script>


        <script>
            $(document).on('click', '.pilih4', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("nokrt").value = $(this).attr('data-nokrt');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("namakel").value = $(this).attr('data-namakel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("namakec").value = $(this).attr('data-namakec');
                $('#myModal4').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih5', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nokk").value = $(this).attr('data-nokk');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("namakk").value = $(this).attr('data-namakk');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("namakel").value = $(this).attr('data-namakel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("namakec").value = $(this).attr('data-namakec');
                document.getElementById("dasawisma").value = $(this).attr('data-dasawisma');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal5').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih6', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nik").value = $(this).attr('data-nik');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("namakel").value = $(this).attr('data-namakel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("namakec").value = $(this).attr('data-namakec');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("dasawisma").value = $(this).attr('data-dasawisma');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal6').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih7', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("namakel").value = $(this).attr('data-namakel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("namakec").value = $(this).attr('data-namakec');
                document.getElementById("dasawisma").value = $(this).attr('data-dasawisma');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal7').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih8', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_kel").value = $(this).attr('data-nama_kel');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("nama_kec").value = $(this).attr('data-nama_kec');
                $('#myModal8').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih9', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nokrt").value = $(this).attr('data-nokrt');
                document.getElementById("noreg").value = $(this).attr('data-noreg');
                document.getElementById("nama").value = $(this).attr('data-nama');
                document.getElementById("nokk").value = $(this).attr('data-nokk');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                document.getElementById("dasawisma").value = $(this).attr('data-dasawisma');
                $('#myModal9').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih10', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_dasawisma").value = $(this).attr('data-nama_dasawisma');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal10').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih11', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nokrt").value = $(this).attr('data-nokrt');
                document.getElementById("namakrt").value = $(this).attr('data-namakrt');
                document.getElementById("nama_lingkungan").value = $(this).attr('data-nama_lingkungan');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_dasawisma").value = $(this).attr('data-nama_dasawisma');
                $('#myModal11').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih12', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("idposyandu").value = $(this).attr('data-idposyandu');
                document.getElementById("namaposyandu").value = $(this).attr('data-namaposyandu');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
                document.getElementById("dasawisma").value = $(this).attr('data-dasawisma');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal12').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih14', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nobln").value = $(this).attr('data-nobln');
                document.getElementById("bulan").value = $(this).attr('data-bulan');
                $('#myModal14').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih15', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nokrt").value = $(this).attr('data-nokrt');
                document.getElementById("namakrt").value = $(this).attr('data-namakrt');
                document.getElementById("nama_dasawisma").value = $(this).attr('data-nama_dasawisma');
                $('#myModal15').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih16', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("idposyandu").value = $(this).attr('data-idposyandu');
                document.getElementById("namaposyandu").value = $(this).attr('data-namaposyandu');
                $('#myModal16').modal('hide');
            });
        </script>

        <script>
            $(document).on('click', '.pilih17', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("idposyandu").value = $(this).attr('data-idposyandu');
                document.getElementById("namaposyandu").value = $(this).attr('data-namaposyandu');
                document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
                document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
                $('#myModal17').modal('hide');
            });
        </script>
        <script>
            $(document).on('click', '.pilih18', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_dasawisma").value = $(this).attr('data-nama_dasawisma');
                document.getElementById("keterangan").value = $(this).attr('data-nama_ketua');
                $('#myModal18').modal('hide');
            });
        </script>
         <script>
            $(document).on('click', '.pilih19', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("kode").value = $(this).attr('data-kode');
                document.getElementById("nama_dasawisma").value = $(this).attr('data-nama_dasawisma');
                document.getElementById("kodekel").value = $(this).attr('data-kodekel');
                document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
                document.getElementById("kodekec").value = $(this).attr('data-kodekec');
                document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
                document.getElementById("lingkungan").value = $(this).attr('data-lingkungan');
                $('#myModal10').modal('hide');
            });
        </script>
          <script>
            $(document).on('click', '.pilih20', function(e) {
                document.getElementById("id").value = $(this).attr('data-id');
                document.getElementById("nokk").value = $(this).attr('data-nokk');
                document.getElementById("nik").value = $(this).attr('data-nik');
                document.getElementById("nama").value = $(this).attr('data-nama');
                $('#myModal19').modal('hide');
            });
        </script>

    </body>

    </html>

<?php
}
?>