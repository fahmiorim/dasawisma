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
	  
		  
			$totakte0104 =pg_query($koneksi, "select count(akte) as totjlhakte0104 from kehamilan where kodekel='0104'");
						$jlhtotakte0104=pg_fetch_array($totakte0104); 
						$jumlahakte0104=$jlhtotakte0104[totjlhakte0104];
						$totjumlahakte0104=number_format($jumlahakte0104,0,",",".");
					echo "$totjumlahakte0104";
 } ?>