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
	  
		  
			$totmeninggal0406 =pg_query($koneksi, "select sum(jlhmeninggal) as totjlhmeninggal0406 from kehamilan where kodekel='0406'");
						$jlhtotmeninggal0406=pg_fetch_array($totmeninggal0406); 
						$jumlahmeninggal0406=$jlhtotmeninggal0406[totjlhmeninggal0406];
						$totjumlahmeninggal0406=number_format($jumlahmeninggal0406,0,",",".");
					echo "$totjumlahmeninggal0406";
 } ?>