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
	  
		  
					$totds0506 =pg_query($koneksi, "select count(kode) as totjlhds0506 from dasawisma where kodekel='0506'");
						$jlhtotds0506=pg_fetch_array($totds0506); 
						$jumlahds0506=$jlhtotds0506[totjlhds0506];
						$totjumlahds0506=number_format($jumlahds0506,0,",",".");
					echo "$totjumlahds0506";
 } ?>