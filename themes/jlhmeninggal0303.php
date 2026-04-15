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
	  
		  
			$totmeninggal0303 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0303 from kehamilan where kodekel='0303'");
						$jlhtotmeninggal0303=pg_fetch_array($totmeninggal0303); 
						$jumlahmeninggal0303=$jlhtotmeninggal0303[totjlhmeninggal0303];
						$totjumlahmeninggal0303=number_format($jumlahmeninggal0303,0,",",".");
					echo "$totjumlahmeninggal0303";
 } ?>