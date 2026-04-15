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
	  
		  
			$totakte0406 =pg_query($koneksi, "select count(akte) as totjlhakte0406 from kehamilan where kodekel='0406'");
						$jlhtotakte0406=pg_fetch_array($totakte0406); 
						$jumlahakte0406=$jlhtotakte0406[totjlhakte0406];
						$totjumlahakte0406=number_format($jumlahakte0406,0,",",".");
					echo "$totjumlahakte0406";
 } ?>