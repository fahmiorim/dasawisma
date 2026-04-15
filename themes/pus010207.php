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
	  
		  
					$totpus010207 =pg_query($koneksi, "select sum(pus) as totjlhpus010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotpus010207=pg_fetch_array($totpus010207); 
						$jumlahpus010207=$jlhtotpus010207[totjlhpus010207];
						$totjumlahpus010207=number_format($jumlahpus010207,0,",",".");
					echo "$totjumlahpus010207";
 } ?>