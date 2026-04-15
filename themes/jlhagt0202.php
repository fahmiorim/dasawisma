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
	  
		  
					$totagt0202 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0202 from keluarga where kodekel='0202'");
						$jlhtotagt0202=pg_fetch_array($totagt0202); 
						$jumlahagt0202=$jlhtotagt0202[totjlhagt0202];
						$totjumlahagt0202=number_format($jumlahagt0202,0,",",".");
					echo "$totjumlahagt0202";
 } ?>