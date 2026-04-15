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
	  
		  
					$totagt0106 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0106 from keluarga where kodekel='0106'");
						$jlhtotagt0106=pg_fetch_array($totagt0106); 
						$jumlahagt0106=$jlhtotagt0106[totjlhagt0106];
						$totjumlahagt0106=number_format($jumlahagt0106,0,",",".");
					echo "$totjumlahagt0106";
 } ?>