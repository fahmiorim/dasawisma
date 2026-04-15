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
	  
		  
					$totagt0407 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0407 from keluarga where kodekel='0407'");
						$jlhtotagt0407=pg_fetch_array($totagt0407); 
						$jumlahagt0407=$jlhtotagt0407[totjlhagt0407];
						$totjumlahagt0407=number_format($jumlahagt0407,0,",",".");
					echo "$totjumlahagt0407";
 } ?>