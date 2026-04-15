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
	  
		  
					$totds0102 =pg_query($koneksi, "select count(kode) as totjlhds0102 from dasawisma where kodekel='0102'");
						$jlhtotds0102=pg_fetch_array($totds0102); 
						$jumlahds0102=$jlhtotds0102[totjlhds0102];
						$totjumlahds0102=number_format($jumlahds0102,0,",",".");
					echo "$totjumlahds0102";
 } ?>