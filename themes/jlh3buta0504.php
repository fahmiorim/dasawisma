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
	  
		  
					$totbuta30504 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30504 from keluarga where kodekel='0504'");
						$jlhtotbuta30504=pg_fetch_array($totbuta30504); 
						$jumlahbuta30504=$jlhtotbuta30504[totjlhbuta30504];
						$totjumlahbuta30504=number_format($jumlahbuta30504,0,",",".");
					echo "$totjumlahbuta30504";
 } ?>