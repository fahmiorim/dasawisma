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
	  
		  
					$totkop0307 =pg_query($koneksi, "select count(kodekel) as totjlhkop0307 from koperasi where kodekel='0307'");
						$jlhtotkop0307=pg_fetch_array($totkop0307); 
						$jumlahkop0307=$jlhtotkop0307[totjlhkop0307];
						$totjumlahkop0307=number_format($jumlahkop0307,0,",",".");
					echo "$totjumlahkop0307";
 } ?>