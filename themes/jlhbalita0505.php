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
	  
		  
					$totbalita0505 =pg_query($koneksi, "select sum(balita) as totjlhbalita0505 from keluarga where kodekel='0505'");
						$jlhtotbalita0505=pg_fetch_array($totbalita0505); 
						$jumlahbalita0505=$jlhtotbalita0505[totjlhbalita0505];
						$totjumlahbalita0505=number_format($jumlahbalita0505,0,",",".");
					echo "$totjumlahbalita0505";
 } ?>