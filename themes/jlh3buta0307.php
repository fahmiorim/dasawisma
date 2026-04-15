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
	  
		  
					$totbuta30307 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30307 from keluarga where kodekel='0307'");
						$jlhtotbuta30307=pg_fetch_array($totbuta30307); 
						$jumlahbuta30307=$jlhtotbuta30307[totjlhbuta30307];
						$totjumlahbuta30307=number_format($jumlahbuta30307,0,",",".");
					echo "$totjumlahbuta30307";
 } ?>