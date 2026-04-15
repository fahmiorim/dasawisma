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
	  
		  
					$totbalita0507 =pg_query($koneksi, "select sum(balita) as totjlhbalita0507 from keluarga where kodekel='0507'");
						$jlhtotbalita0507=pg_fetch_array($totbalita0507); 
						$jumlahbalita0507=$jlhtotbalita0507[totjlhbalita0507];
						$totjumlahbalita0507=number_format($jumlahbalita0507,0,",",".");
					echo "$totjumlahbalita0507";
 } ?>