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
	  
		  
			$totakte0305 =pg_query($koneksi, "select count(akte) as totjlhakte0305 from kehamilan where kodekel='0305'");
						$jlhtotakte0305=pg_fetch_array($totakte0305); 
						$jumlahakte0305=$jlhtotakte0305[totjlhakte0305];
						$totjumlahakte0305=number_format($jumlahakte0305,0,",",".");
					echo "$totjumlahakte0305";
 } ?>