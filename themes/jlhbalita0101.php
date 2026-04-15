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
	  
		  
					$totbalita0101 =pg_query($koneksi, "select sum(balita) as totjlhbalita0101 from keluarga where kodekel='0101'");
						$jlhtotbalita0101=pg_fetch_array($totbalita0101); 
						$jumlahbalita0101=$jlhtotbalita0101[totjlhbalita0101];
						$totjumlahbalita0101=number_format($jumlahbalita0101,0,",",".");
					echo "$totjumlahbalita0101";
 } ?>