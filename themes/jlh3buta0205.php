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
	  
		  
					$totbuta30205 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30205 from keluarga where kodekel='0205'");
						$jlhtotbuta30205=pg_fetch_array($totbuta30205); 
						$jumlahbuta30205=$jlhtotbuta30205[totjlhbuta30205];
						$totjumlahbuta30205=number_format($jumlahbuta30205,0,",",".");
					echo "$totjumlahbuta30205";
 } ?>