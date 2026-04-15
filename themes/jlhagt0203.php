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
	  
		  
					$totagt0203 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0203 from keluarga where kodekel='0203'");
						$jlhtotagt0203=pg_fetch_array($totagt0203); 
						$jumlahagt0203=$jlhtotagt0203[totjlhagt0203];
						$totjumlahagt0203=number_format($jumlahagt0203,0,",",".");
					echo "$totjumlahagt0203";
 } ?>