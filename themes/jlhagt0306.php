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
	  
		  
					$totagt0306 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0306 from keluarga where kodekel='0306'");
						$jlhtotagt0306=pg_fetch_array($totagt0306); 
						$jumlahagt0306=$jlhtotagt0306[totjlhagt0306];
						$totjumlahagt0306=number_format($jumlahagt0306,0,",",".");
					echo "$totjumlahagt0306";
 } ?>