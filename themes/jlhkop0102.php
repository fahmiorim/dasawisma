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
	  
		  
					$totkop0102 =pg_query($koneksi, "select count(kodekel) as totjlhkop0102 from koperasi where kodekel='0102'");
						$jlhtotkop0102=pg_fetch_array($totkop0102); 
						$jumlahkop0102=$jlhtotkop0102[totjlhkop0102];
						$totjumlahkop0102=number_format($jumlahkop0102,0,",",".");
					echo "$totjumlahkop0102";
 } ?>