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
	  
		  
					$totagt0301 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0301 from keluarga where kodekel='0301'");
						$jlhtotagt0301=pg_fetch_array($totagt0301); 
						$jumlahagt0301=$jlhtotagt0301[totjlhagt0301];
						$totjumlahagt0301=number_format($jumlahagt0301,0,",",".");
					echo "$totjumlahagt0301";
 } ?>