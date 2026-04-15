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
	  
		  
					$totpus0305 =pg_query($koneksi, "select sum(pus) as totjlhpus0305 from keluarga where kodekel='0305'");
						$jlhtotpus0305=pg_fetch_array($totpus0305); 
						$jumlahpus0305=$jlhtotpus0305[totjlhpus0305];
						$totjumlahpus0305=number_format($jumlahpus0305,0,",",".");
					echo "$totjumlahpus0305";
 } ?>