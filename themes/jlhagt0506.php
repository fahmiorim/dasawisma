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
	  
		  
					$totagt0506 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0506 from keluarga where kodekel='0506'");
						$jlhtotagt0506=pg_fetch_array($totagt0506); 
						$jumlahagt0506=$jlhtotagt0506[totjlhagt0506];
						$totjumlahagt0506=number_format($jumlahagt0506,0,",",".");
					echo "$totjumlahagt0506";
 } ?>