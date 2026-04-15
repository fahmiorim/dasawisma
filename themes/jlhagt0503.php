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
	  
		  
					$totagt0503 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0503 from keluarga where kodekel='0503'");
						$jlhtotagt0503=pg_fetch_array($totagt0503); 
						$jumlahagt0503=$jlhtotagt0503[totjlhagt0503];
						$totjumlahagt0503=number_format($jumlahagt0503,0,",",".");
					echo "$totjumlahagt0503";
 } ?>