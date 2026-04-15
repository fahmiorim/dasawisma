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
	  
		  
					$totbalita0304 =pg_query($koneksi, "select sum(balita) as totjlhbalita0304 from keluarga where kodekel='0304'");
						$jlhtotbalita0304=pg_fetch_array($totbalita0304); 
						$jumlahbalita0304=$jlhtotbalita0304[totjlhbalita0304];
						$totjumlahbalita0304=number_format($jumlahbalita0304,0,",",".");
					echo "$totjumlahbalita0304";
 } ?>