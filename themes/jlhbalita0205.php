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
	  
		  
					$totbalita0205 =pg_query($koneksi, "select sum(balita) as totjlhbalita0205 from keluarga where kodekel='0205'");
						$jlhtotbalita0205=pg_fetch_array($totbalita0205); 
						$jumlahbalita0205=$jlhtotbalita0205[totjlhbalita0205];
						$totjumlahbalita0205=number_format($jumlahbalita0205,0,",",".");
					echo "$totjumlahbalita0205";
 } ?>