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
	  
		  
			$totakte0103 =pg_query($koneksi, "select count(akte) as totjlhakte0103 from kehamilan where kodekel='0103'");
						$jlhtotakte0103=pg_fetch_array($totakte0103); 
						$jumlahakte0103=$jlhtotakte0103[totjlhakte0103];
						$totjumlahakte0103=number_format($jumlahakte0103,0,",",".");
					echo "$totjumlahakte0103";
 } ?>