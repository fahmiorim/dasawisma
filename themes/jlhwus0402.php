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
	  
		  
					$totwus0402 =pg_query($koneksi, "select sum(wus) as totjlhwus0402 from keluarga where kodekel='0402'");
						$jlhtotwus0402=pg_fetch_array($totwus0402); 
						$jumlahwus0402=$jlhtotwus0402[totjlhwus0402];
						$totjumlahwus0402=number_format($jumlahwus0402,0,",",".");
					echo "$totjumlahwus0402";
 } ?>