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
	  
		  
					$totkk0305 =pg_query($koneksi, "select sum(jlhkk) as totjlhkk0305 from keluarga where kodekel='0305'");
						$jlhtotkk0305=pg_fetch_array($totkk0305); 
						$jumlahkk0305=$jlhtotkk0305[totjlhkk0305];
						$totjumlahkk0305=number_format($jumlahkk0305,0,",",".");
					echo "$totjumlahkk0305";
 } ?>