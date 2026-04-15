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
	  
		  
			$totmeninggal0105 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0105 from kehamilan where kodekel='0105'");
						$jlhtotmeninggal0105=pg_fetch_array($totmeninggal0105); 
						$jumlahmeninggal0105=$jlhtotmeninggal0105[totjlhmeninggal0105];
						$totjumlahmeninggal0105=number_format($jumlahmeninggal0105,0,",",".");
					echo "$totjumlahmeninggal0105";
 } ?>