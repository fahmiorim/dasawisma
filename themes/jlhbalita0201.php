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
	  
		  
					$totbalita0201 =pg_query($koneksi, "select sum(balita) as totjlhbalita0201 from keluarga where kodekel='0201'");
						$jlhtotbalita0201=pg_fetch_array($totbalita0201); 
						$jumlahbalita0201=$jlhtotbalita0201[totjlhbalita0201];
						$totjumlahbalita0201=number_format($jumlahbalita0201,0,",",".");
					echo "$totjumlahbalita0201";
 } ?>