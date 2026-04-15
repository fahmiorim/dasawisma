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
	  
		  
					$totwus0103 =pg_query($koneksi, "select sum(wus) as totjlhwus0103 from keluarga where kodekel='0103'");
						$jlhtotwus0103=pg_fetch_array($totwus0103); 
						$jumlahwus0103=$jlhtotwus0103[totjlhwus0103];
						$totjumlahwus0103=number_format($jumlahwus0103,0,",",".");
					echo "$totjumlahwus0103";
 } ?>