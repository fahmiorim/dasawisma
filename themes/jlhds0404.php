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
	  
		  
					$totds0404 =pg_query($koneksi, "select count(kode) as totjlhds0404 from dasawisma where kodekel='0404'");
						$jlhtotds0404=pg_fetch_array($totds0404); 
						$jumlahds0404=$jlhtotds0404[totjlhds0404];
						$totjumlahds0404=number_format($jumlahds0404,0,",",".");
					echo "$totjumlahds0404";
 } ?>