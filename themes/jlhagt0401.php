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
	  
		  
					$totagt0401 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0401 from keluarga where kodekel='0401'");
						$jlhtotagt0401=pg_fetch_array($totagt0401); 
						$jumlahagt0401=$jlhtotagt0401[totjlhagt0401];
						$totjumlahagt0401=number_format($jumlahagt0401,0,",",".");
					echo "$totjumlahagt0401";
 } ?>