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
	  
		  
					$totbuta30405 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30405 from keluarga where kodekel='0405'");
						$jlhtotbuta30405=pg_fetch_array($totbuta30405); 
						$jumlahbuta30405=$jlhtotbuta30405[totjlhbuta30405];
						$totjumlahbuta30405=number_format($jumlahbuta30405,0,",",".");
					echo "$totjumlahbuta30405";
 } ?>