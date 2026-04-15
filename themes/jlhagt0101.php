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
	  
		  
					$totagt0101 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0101 from keluarga where kodekel='0101'");
						$jlhtotagt0101=pg_fetch_array($totagt0101); 
						$jumlahagt0101=$jlhtotagt0101[totjlhagt0101];
						$totjumlahagt0101=number_format($jumlahagt0101,0,",",".");
					echo "$totjumlahagt0101";
 } ?>