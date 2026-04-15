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
	  
		  
					$totbalita0307 =pg_query($koneksi, "select sum(balita) as totjlhbalita0307 from keluarga where kodekel='0307'");
						$jlhtotbalita0307=pg_fetch_array($totbalita0307); 
						$jumlahbalita0307=$jlhtotbalita0307[totjlhbalita0307];
						$totjumlahbalita0307=number_format($jumlahbalita0307,0,",",".");
					echo "$totjumlahbalita0307";
 } ?>