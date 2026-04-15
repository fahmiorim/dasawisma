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
	  
		  
					$totds0503 =pg_query($koneksi, "select count(kode) as totjlhds0503 from dasawisma where kodekel='0503'");
						$jlhtotds0503=pg_fetch_array($totds0503); 
						$jumlahds0503=$jlhtotds0503[totjlhds0503];
						$totjumlahds0503=number_format($jumlahds0503,0,",",".");
					echo "$totjumlahds0503";
 } ?>