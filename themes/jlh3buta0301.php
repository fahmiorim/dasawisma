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
	  
		  
					$totbuta30301 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30301 from keluarga where kodekel='0301'");
						$jlhtotbuta30301=pg_fetch_array($totbuta30301); 
						$jumlahbuta30301=$jlhtotbuta30301[totjlhbuta30301];
						$totjumlahbuta30301=number_format($jumlahbuta30301,0,",",".");
					echo "$totjumlahbuta30301";
 } ?>