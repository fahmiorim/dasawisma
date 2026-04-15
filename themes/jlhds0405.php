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
	  
		  
					$totds0405 =pg_query($koneksi, "select count(kode) as totjlhds0405 from dasawisma where kodekel='0405'");
						$jlhtotds0405=pg_fetch_array($totds0405); 
						$jumlahds0405=$jlhtotds0405[totjlhds0405];
						$totjumlahds0405=number_format($jumlahds0405,0,",",".");
					echo "$totjumlahds0405";
 } ?>