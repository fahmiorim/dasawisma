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
	  
		  
			$totakte0306 =pg_query($koneksi, "select count(akte) as totjlhakte0306 from kehamilan where kodekel='0306'");
						$jlhtotakte0306=pg_fetch_array($totakte0306); 
						$jumlahakte0306=$jlhtotakte0306[totjlhakte0306];
						$totjumlahakte0306=number_format($jumlahakte0306,0,",",".");
					echo "$totjumlahakte0306";
 } ?>