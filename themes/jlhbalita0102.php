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
	  
		  
					$totbalita0102 =pg_query($koneksi, "select sum(balita) as totjlhbalita0102 from keluarga where kodekel='0102'");
						$jlhtotbalita0102=pg_fetch_array($totbalita0102); 
						$jumlahbalita0102=$jlhtotbalita0102[totjlhbalita0102];
						$totjumlahbalita0102=number_format($jumlahbalita0102,0,",",".");
					echo "$totjumlahbalita0102";
 } ?>