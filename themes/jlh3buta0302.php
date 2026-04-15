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
	  
		  
					$totbuta30302 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30302 from keluarga where kodekel='0302'");
						$jlhtotbuta30302=pg_fetch_array($totbuta30302); 
						$jumlahbuta30302=$jlhtotbuta30302[totjlhbuta30302];
						$totjumlahbuta30302=number_format($jumlahbuta30302,0,",",".");
					echo "$totjumlahbuta30302";
 } ?>