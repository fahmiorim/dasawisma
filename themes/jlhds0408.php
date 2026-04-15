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
	  
		  
					$totds0408 =pg_query($koneksi, "select count(kode) as totjlhds0408 from dasawisma where kodekel='0408'");
						$jlhtotds0408=pg_fetch_array($totds0408); 
						$jumlahds0408=$jlhtotds0408[totjlhds0408];
						$totjumlahds0408=number_format($jumlahds0408,0,",",".");
					echo "$totjumlahds0408";
 } ?>