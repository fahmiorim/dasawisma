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
	  
		  
					$totds0301 =pg_query($koneksi, "select count(kode) as totjlhds0301 from dasawisma where kodekel='0301'");
						$jlhtotds0301=pg_fetch_array($totds0301); 
						$jumlahds0301=$jlhtotds0301[totjlhds0301];
						$totjumlahds0301=number_format($jumlahds0301,0,",",".");
					echo "$totjumlahds0301";
 } ?>