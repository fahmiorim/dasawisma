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
	  
		  
					$totagt0204 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0204 from keluarga where kodekel='0204'");
						$jlhtotagt0204=pg_fetch_array($totagt0204); 
						$jumlahagt0204=$jlhtotagt0204[totjlhagt0204];
						$totjumlahagt0204=number_format($jumlahagt0204,0,",",".");
					echo "$totjumlahagt0204";
 } ?>