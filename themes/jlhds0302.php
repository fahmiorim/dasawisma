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
	  
		  
					$totds0302 =pg_query($koneksi, "select count(kode) as totjlhds0302 from dasawisma where kodekel='0302'");
						$jlhtotds0302=pg_fetch_array($totds0302); 
						$jumlahds0302=$jlhtotds0302[totjlhds0302];
						$totjumlahds0302=number_format($jumlahds0302,0,",",".");
					echo "$totjumlahds0302";
 } ?>