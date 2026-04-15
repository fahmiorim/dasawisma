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
	  
		  
			$totakte0201 =pg_query($koneksi, "select count(akte) as totjlhakte0201 from kehamilan where kodekel='0201'");
						$jlhtotakte0201=pg_fetch_array($totakte0201); 
						$jumlahakte0201=$jlhtotakte0201[totjlhakte0201];
						$totjumlahakte0201=number_format($jumlahakte0201,0,",",".");
					echo "$totjumlahakte0201";
 } ?>