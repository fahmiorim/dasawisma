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
	  
		  
			$totakte0303 =pg_query($koneksi, "select count(akte) as totjlhakte0303 from kehamilan where kodekel='0303'");
						$jlhtotakte0303=pg_fetch_array($totakte0303); 
						$jumlahakte0303=$jlhtotakte0303[totjlhakte0303];
						$totjumlahakte0303=number_format($jumlahakte0303,0,",",".");
					echo "$totjumlahakte0303";
 } ?>