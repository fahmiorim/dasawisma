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
	  
		  
					$totkk0105 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0105 from keluarga where kodekel='0105'");
						$jlhtotkk0105=pg_fetch_array($totkk0105); 
						$jumlahkk0105=$jlhtotkk0105[totjlhkk0105];
						$totjumlahkk0105=number_format($jumlahkk0105,0,",",".");
					echo "$totjumlahkk0105";
 } ?>