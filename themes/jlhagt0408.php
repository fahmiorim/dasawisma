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
	  
		  
					$totagt0408 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0408 from keluarga where kodekel='0408'");
						$jlhtotagt0408=pg_fetch_array($totagt0408); 
						$jumlahagt0408=$jlhtotagt0408[totjlhagt0408];
						$totjumlahagt0408=number_format($jumlahagt0408,0,",",".");
					echo "$totjumlahagt0408";
 } ?>