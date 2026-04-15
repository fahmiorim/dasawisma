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
	  
		  
					$totpus030207 =pg_query($koneksi, "select sum(pus) as totjlhpus030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotpus030207=pg_fetch_array($totpus030207); 
						$jumlahpus030207=$jlhtotpus030207[totjlhpus030207];
						$totjumlahpus030207=number_format($jumlahpus030207,0,",",".");
					echo "$totjumlahpus030207";
 } ?>