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
	  
		  
			$totakte0105 =pg_query($koneksi, "select count(akte) as totjlhakte0105 from kehamilan where kodekel='0105'");
						$jlhtotakte0105=pg_fetch_array($totakte0105); 
						$jumlahakte0105=$jlhtotakte0105[totjlhakte0105];
						$totjumlahakte0105=number_format($jumlahakte0105,0,",",".");
					echo "$totjumlahakte0105";
 } ?>