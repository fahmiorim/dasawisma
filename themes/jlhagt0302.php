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
	  
		  
					$totagt0302 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0302 from keluarga where kodekel='0302'");
						$jlhtotagt0302=pg_fetch_array($totagt0302); 
						$jumlahagt0302=$jlhtotagt0302[totjlhagt0302];
						$totjumlahagt0302=number_format($jumlahagt0302,0,",",".");
					echo "$totjumlahagt0302";
 } ?>