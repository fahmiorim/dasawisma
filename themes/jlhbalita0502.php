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
	  
		  
					$totbalita0502 =pg_query($koneksi, "select sum(balita) as totjlhbalita0502 from keluarga where kodekel='0502'");
						$jlhtotbalita0502=pg_fetch_array($totbalita0502); 
						$jumlahbalita0502=$jlhtotbalita0502[totjlhbalita0502];
						$totjumlahbalita0502=number_format($jumlahbalita0502,0,",",".");
					echo "$totjumlahbalita0502";
 } ?>