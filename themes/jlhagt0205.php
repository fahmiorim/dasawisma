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
	  
		  
					$totagt0205 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0205 from keluarga where kodekel='0205'");
						$jlhtotagt0205=pg_fetch_array($totagt0205); 
						$jumlahagt0205=$jlhtotagt0205[totjlhagt0205];
						$totjumlahagt0205=number_format($jumlahagt0205,0,",",".");
					echo "$totjumlahagt0205";
 } ?>