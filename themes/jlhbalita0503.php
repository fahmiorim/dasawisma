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
	  
		  
					$totbalita0503 =pg_query($koneksi, "select sum(balita) as totjlhbalita0503 from keluarga where kodekel='0503'");
						$jlhtotbalita0503=pg_fetch_array($totbalita0503); 
						$jumlahbalita0503=$jlhtotbalita0503[totjlhbalita0503];
						$totjumlahbalita0503=number_format($jumlahbalita0503,0,",",".");
					echo "$totjumlahbalita0503";
 } ?>