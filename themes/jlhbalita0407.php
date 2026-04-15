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
	  
		  
					$totbalita0407 =pg_query($koneksi, "select sum(balita) as totjlhbalita0407 from keluarga where kodekel='0407'");
						$jlhtotbalita0407=pg_fetch_array($totbalita0407); 
						$jumlahbalita0407=$jlhtotbalita0407[totjlhbalita0407];
						$totjumlahbalita0407=number_format($jumlahbalita0407,0,",",".");
					echo "$totjumlahbalita0407";
 } ?>