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
	  
		  
			$totakte0207 =pg_query($koneksi, "select count(akte) as totjlhakte0207 from kehamilan where kodekel='0207'");
						$jlhtotakte0207=pg_fetch_array($totakte0207); 
						$jumlahakte0207=$jlhtotakte0207[totjlhakte0207];
						$totjumlahakte0207=number_format($jumlahakte0207,0,",",".");
					echo "$totjumlahakte0207";
 } ?>