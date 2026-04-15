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
	  
		  
					$totds0307 =pg_query($koneksi, "select count(kode) as totjlhds0307 from dasawisma where kodekel='0307'");
						$jlhtotds0307=pg_fetch_array($totds0307); 
						$jumlahds0307=$jlhtotds0307[totjlhds0307];
						$totjumlahds0307=number_format($jumlahds0307,0,",",".");
					echo "$totjumlahds0307";
 } ?>