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
	  
		  
					$totagt0505 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0505 from keluarga where kodekel='0505'");
						$jlhtotagt0505=pg_fetch_array($totagt0505); 
						$jumlahagt0505=$jlhtotagt0505[totjlhagt0505];
						$totjumlahagt0505=number_format($jumlahagt0505,0,",",".");
					echo "$totjumlahagt0505";
 } ?>