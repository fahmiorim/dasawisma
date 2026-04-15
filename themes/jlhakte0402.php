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
	  
		  
			$totakte0402 =pg_query($koneksi, "select count(akte) as totjlhakte0402 from kehamilan where kodekel='0402'");
						$jlhtotakte0402=pg_fetch_array($totakte0402); 
						$jumlahakte0402=$jlhtotakte0402[totjlhakte0402];
						$totjumlahakte0402=number_format($jumlahakte0402,0,",",".");
					echo "$totjumlahakte0402";
 } ?>