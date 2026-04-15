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
	  
		  
					$totds0401 =pg_query($koneksi, "select count(kode) as totjlhds0401 from dasawisma where kodekel='0401'");
						$jlhtotds0401=pg_fetch_array($totds0401); 
						$jumlahds0401=$jlhtotds0401[totjlhds0401];
						$totjumlahds0401=number_format($jumlahds0401,0,",",".");
					echo "$totjumlahds0401";
 } ?>