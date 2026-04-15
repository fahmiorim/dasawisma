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
	  
		  
					$totbuta30401 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30401 from keluarga where kodekel='0401'");
						$jlhtotbuta30401=pg_fetch_array($totbuta30401); 
						$jumlahbuta30401=$jlhtotbuta30401[totjlhbuta30401];
						$totjumlahbuta30401=number_format($jumlahbuta30401,0,",",".");
					echo "$totjumlahbuta30401";
 } ?>