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
	  
		  
					$totbuta30503 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30503 from keluarga where kodekel='0503'");
						$jlhtotbuta30503=pg_fetch_array($totbuta30503); 
						$jumlahbuta30503=$jlhtotbuta30503[totjlhbuta30503];
						$totjumlahbuta30503=number_format($jumlahbuta30503,0,",",".");
					echo "$totjumlahbuta30503";
 } ?>