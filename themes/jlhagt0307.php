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
	  
		  
					$totagt0307 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0307 from keluarga where kodekel='0307'");
						$jlhtotagt0307=pg_fetch_array($totagt0307); 
						$jumlahagt0307=$jlhtotagt0307[totjlhagt0307];
						$totjumlahagt0307=number_format($jumlahagt0307,0,",",".");
					echo "$totjumlahagt0307";
 } ?>