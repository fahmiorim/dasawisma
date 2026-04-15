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
	  
		  
			$totakte0206 =pg_query($koneksi, "select count(akte) as totjlhakte0206 from kehamilan where kodekel='0206'");
						$jlhtotakte0206=pg_fetch_array($totakte0206); 
						$jumlahakte0206=$jlhtotakte0206[totjlhakte0206];
						$totjumlahakte0206=number_format($jumlahakte0206,0,",",".");
					echo "$totjumlahakte0206";
 } ?>