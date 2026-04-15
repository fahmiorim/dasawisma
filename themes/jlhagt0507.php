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
	  
		  
					$totagt0507 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0507 from keluarga where kodekel='0507'");
						$jlhtotagt0507=pg_fetch_array($totagt0507); 
						$jumlahagt0507=$jlhtotagt0507[totjlhagt0507];
						$totjumlahagt0507=number_format($jumlahagt0507,0,",",".");
					echo "$totjumlahagt0507";
 } ?>