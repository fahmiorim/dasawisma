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
	  
		  
					$totbalita0404 =pg_query($koneksi, "select sum(balita) as totjlhbalita0404 from keluarga where kodekel='0404'");
						$jlhtotbalita0404=pg_fetch_array($totbalita0404); 
						$jumlahbalita0404=$jlhtotbalita0404[totjlhbalita0404];
						$totjumlahbalita0404=number_format($jumlahbalita0404,0,",",".");
					echo "$totjumlahbalita0404";
 } ?>