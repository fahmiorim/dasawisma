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

        function print_records_rptkeluargakel() {
            document.frm.action = "appmaster.php?module=lapkeluargakel";
            document.frm.submit();
        }
        //===============================================

        function print_records_rptcatkeluargads() {
            document.frm.action = "appmaster.php?module=lapcatkeluargads";
            document.frm.submit();
        }

        function print_records_rptcatkeluargakel() {
            document.frm.action = "appmaster.php?module=lapcatkeluargakel";
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

        function print_records_rptkeluargakel() {
            document.frm.action = "appmaster.php?module=lapkeluargakel";
            document.frm.submit();
        }

        function print_records_rptcatkeluargads() {
            document.frm.action = "appmaster.php?module=lapkeluargads";
            document.frm.submit();
        }

        function print_records_rptcatkeluargakel() {
            document.frm.action = "appmaster.php?module=lapkeluarga";
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
                $("#example3").DataTable();
                $("#example4").DataTable();
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