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
	  
		  
					$totbalita0206 =pg_query($koneksi, "select sum(balita) as totjlhbalita0206 from keluarga where kodekel='0206'");
						$jlhtotbalita0206=pg_fetch_array($totbalita0206); 
						$jumlahbalita0206=$jlhtotbalita0206[totjlhbalita0206];
						$totjumlahbalita0206=number_format($jumlahbalita0206,0,",",".");
					echo "$totjumlahbalita0206";
 } ?>