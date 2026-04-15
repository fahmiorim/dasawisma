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
	  
		  
					$totagt0405 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0405 from keluarga where kodekel='0405'");
						$jlhtotagt0405=pg_fetch_array($totagt0405); 
						$jumlahagt0405=$jlhtotagt0405[totjlhagt0405];
						$totjumlahagt0405=number_format($jumlahagt0405,0,",",".");
					echo "$totjumlahagt0405";
 } ?>