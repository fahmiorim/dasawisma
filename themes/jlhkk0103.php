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
	  
		  
					$totkk0103 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0103 from keluarga where kodekel='0103'");
						$jlhtotkk0103=pg_fetch_array($totkk0103); 
						$jumlahkk0103=$jlhtotkk0103[totjlhkk0103];
						$totjumlahkk0103=number_format($jumlahkk0103,0,",",".");
					echo "$totjumlahkk0103";
 } ?>