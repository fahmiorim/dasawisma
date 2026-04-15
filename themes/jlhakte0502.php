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
	  
		  
			$totakte0502 =pg_query($koneksi, "select count(akte) as totjlhakte0502 from kehamilan where kodekel='0502'");
						$jlhtotakte0502=pg_fetch_array($totakte0502); 
						$jumlahakte0502=$jlhtotakte0502[totjlhakte0502];
						$totjumlahakte0502=number_format($jumlahakte0502,0,",",".");
					echo "$totjumlahakte0502";
 } ?>