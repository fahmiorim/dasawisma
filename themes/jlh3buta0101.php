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
	  
		  
					$totbuta30101 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30101 from keluarga where kodekel='0101'");
						$jlhtotbuta30101=pg_fetch_array($totbuta30101); 
						$jumlahbuta30101=$jlhtotbuta30101[totjlhbuta30101];
						$totjumlahbuta30101=number_format($jumlahbuta30101,0,",",".");
					echo "$totjumlahbuta30101";
 } ?>