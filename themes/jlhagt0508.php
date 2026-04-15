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
	  
		  
					$totagt0508 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0508 from keluarga where kodekel='0508'");
						$jlhtotagt0508=pg_fetch_array($totagt0508); 
						$jumlahagt0508=$jlhtotagt0508[totjlhagt0508];
						$totjumlahagt0508=number_format($jumlahagt0508,0,",",".");
					echo "$totjumlahagt0508";
 } ?>