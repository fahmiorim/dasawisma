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
	  
		  
					$totkop0101 =pg_query($koneksi, "select count(kodekel) as totjlhkop0101 from koperasi where kodekel='0101'");
						$jlhtotkop0101=pg_fetch_array($totkop0101); 
						$jumlahkop0101=$jlhtotkop0101[totjlhkop0101];
						$totjumlahkop0101=number_format($jumlahkop0101,0,",",".");
					echo "$totjumlahkop0101";
 } ?>