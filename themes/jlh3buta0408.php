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
	  
		  
					$totbuta30408 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30408 from keluarga where kodekel='0408'");
						$jlhtotbuta30408=pg_fetch_array($totbuta30408); 
						$jumlahbuta30408=$jlhtotbuta30408[totjlhbuta30408];
						$totjumlahbuta30408=number_format($jumlahbuta30408,0,",",".");
					echo "$totjumlahbuta30408";
 } ?>