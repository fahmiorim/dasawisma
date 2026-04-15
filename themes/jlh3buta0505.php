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
	  
		  
					$totbuta30505 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30505 from keluarga where kodekel='0505'");
						$jlhtotbuta30505=pg_fetch_array($totbuta30505); 
						$jumlahbuta30505=$jlhtotbuta30505[totjlhbuta30505];
						$totjumlahbuta30505=number_format($jumlahbuta30505,0,",",".");
					echo "$totjumlahbuta30505";
 } ?>