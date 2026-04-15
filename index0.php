<?php
$appurl = 'http://localhost/dasawisma/';
//$appurl='http://dasawisma.binjaikota.go.id/';

?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Kabupaten Batu Bara| Log in</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
    <link href="assets/css/bootstrap.css" rel="stylesheet" /> 
    <link href="assets/css/font-awesome.css" rel="stylesheet" /> 
    <link href="assets/css/AdminLTE.css" rel="stylesheet" />   
	   <link rel="icon" href="<?php echo $appurl;?>favicon.png">
	<link rel="stylesheet" href="assets/plugins/validationengine/css/validationEngine.jquery.css" />
<style type="text/css">
#hidden {display:none}
#progress-bar {position:fixed;z-index:9999;top:0;left:0;width:0;height:2px;background-color:#4aa6e7}
#loading {position:absolute;z-index:999;top:0;left:0;width:100%;height:100%;background:#ffffff url(images/spinner/load.gif) center no-repeat}
</style>
  </head>
  <div id="hidden">
<div id="progress-bar"></div><div id="loading"></div>
</div>
  <body class="login-page">
    <div class="login-box"> <div align="center"><img src="images/logopkk.png" ></div>
      <div class="login-logo">

        <a href="index.php"><strong>e-Dasawisma</strong></a>
	
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>
        <form action="cek_login.php" method="post" id="popup-validation"> 
          <div class="form-group has-feedback">
            <input type="text" name="username" class="validate[required] form-control" placeholder="Username" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="validate[required] form-control" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
				<div class="form-group has-feedback">	
					  <select class='validate[required] form-control' name='tahunaktif' id='tahunaktif' placeholder="tahun">
						<?php
							include "config/library.php";
						?>
							<option><?php echo "$thn_sekarang";?></option>
              
						<?php
							include "config/koneksi.php";
									$thn = pg_query($koneksi, "SELECT * FROM tahunaktif order by id"); 
										while($p = pg_fetch_array($thn)){
													
											echo"
												<option value=\"$p[thnaktif]\">$p[thnaktif]</option>\n";
											}
										echo"";	
														  
						?>									  								  
						</select>		


                     	</div>
		  
		  
		  
          <div class="row">
            <div class="col-xs-8"> 
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-key"></i><i class=""></i> Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">

         
        </div><!-- /.social-auth-links -->

      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck --> 
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

	<script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="assets/js2/validationInit.js"></script>		
	<script>
        $(function () { formValidation(); });
    </script>
  </body>
</html>
