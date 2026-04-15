 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
					$totwus0305 =pg_query($koneksi, "select sum(wus) as totjlhwus0305 from keluarga where kodekel='0305'");
						$jlhtotwus0305=pg_fetch_array($totwus0305); 
						$jumlahwus0305=$jlhtotwus0305[totjlhwus0305];
						$totjumlahwus0305=number_format($jumlahwus0305,0,",",".");
					echo "$totjumlahwus0305";
 } ?>