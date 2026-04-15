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
	  
		  
					$totbalita0202 =pg_query($koneksi, "select sum(balita) as totjlhbalita0202 from keluarga where kodekel='0202'");
						$jlhtotbalita0202=pg_fetch_array($totbalita0202); 
						$jumlahbalita0202=$jlhtotbalita0202[totjlhbalita0202];
						$totjumlahbalita0202=number_format($jumlahbalita0202,0,",",".");
					echo "$totjumlahbalita0202";
 } ?>