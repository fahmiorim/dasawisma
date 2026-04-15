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
	  
		  
					$totagt0404 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0404 from keluarga where kodekel='0404'");
						$jlhtotagt0404=pg_fetch_array($totagt0404); 
						$jumlahagt0404=$jlhtotagt0404[totjlhagt0404];
						$totjumlahagt0404=number_format($jumlahagt0404,0,",",".");
					echo "$totjumlahagt0404";
 } ?>