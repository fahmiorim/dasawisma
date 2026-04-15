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
	  
		  
					$totds0106 =pg_query($koneksi, "select count(kode) as totjlhds0106 from dasawisma where kodekel='0106'");
						$jlhtotds0106=pg_fetch_array($totds0106); 
						$jumlahds0106=$jlhtotds0106[totjlhds0106];
						$totjumlahds0106=number_format($jumlahds0106,0,",",".");
					echo "$totjumlahds0106";
 } ?>