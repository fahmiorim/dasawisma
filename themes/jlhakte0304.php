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
	  
		  
			$totakte0304 =pg_query($koneksi, "select count(akte) as totjlhakte0304 from kehamilan where kodekel='0304'");
						$jlhtotakte0304=pg_fetch_array($totakte0304); 
						$jumlahakte0304=$jlhtotakte0304[totjlhakte0304];
						$totjumlahakte0304=number_format($jumlahakte0304,0,",",".");
					echo "$totjumlahakte0304";
 } ?>