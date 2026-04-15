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
	  
		  
					$totagt0102 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0102 from keluarga where kodekel='0102'");
						$jlhtotagt0102=pg_fetch_array($totagt0102); 
						$jumlahagt0102=$jlhtotagt0102[totjlhagt0102];
						$totjumlahagt0102=number_format($jumlahagt0102,0,",",".");
					echo "$totjumlahagt0102";
 } ?>