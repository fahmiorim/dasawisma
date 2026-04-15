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
	  
		  
					$totbalita0501 =pg_query($koneksi, "select sum(balita) as totjlhbalita0501 from keluarga where kodekel='0501'");
						$jlhtotbalita0501=pg_fetch_array($totbalita0501); 
						$jumlahbalita0501=$jlhtotbalita0501[totjlhbalita0501];
						$totjumlahbalita0501=number_format($jumlahbalita0501,0,",",".");
					echo "$totjumlahbalita0501";
 } ?>