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
	  
		  
					$totwus0105 =pg_query($koneksi, "select sum(wus) as totjlhwus0105 from keluarga where kodekel='0105'");
						$jlhtotwus0105=pg_fetch_array($totwus0105); 
						$jumlahwus0105=$jlhtotwus0105[totjlhwus0105];
						$totjumlahwus0105=number_format($jumlahwus0105,0,",",".");
					echo "$totjumlahwus0105";
 } ?>