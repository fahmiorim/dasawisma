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
	  
		  
					$totagt0403 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0403 from keluarga where kodekel='0403'");
						$jlhtotagt0403=pg_fetch_array($totagt0403); 
						$jumlahagt0403=$jlhtotagt0403[totjlhagt0403];
						$totjumlahagt0403=number_format($jumlahagt0403,0,",",".");
					echo "$totjumlahagt0403";
 } ?>