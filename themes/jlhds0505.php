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
	  
		  
					$totds0505 =pg_query($koneksi, "select count(kode) as totjlhds0505 from dasawisma where kodekel='0505'");
						$jlhtotds0505=pg_fetch_array($totds0505); 
						$jumlahds0505=$jlhtotds0505[totjlhds0505];
						$totjumlahds0505=number_format($jumlahds0505,0,",",".");
					echo "$totjumlahds0505";
 } ?>