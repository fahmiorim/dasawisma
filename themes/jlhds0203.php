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
	  
		  
					$totds0203 =pg_query($koneksi, "select count(kode) as totjlhds0203 from dasawisma where kodekel='0203'");
						$jlhtotds0203=pg_fetch_array($totds0203); 
						$jumlahds0203=$jlhtotds0203[totjlhds0203];
						$totjumlahds0203=number_format($jumlahds0203,0,",",".");
					echo "$totjumlahds0203";
 } ?>