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
	  
		  
					$totpusyd020207 =pg_query($koneksi, "select sum(pusyd) as totjlhpusyd020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotpusyd020207=pg_fetch_array($totpusyd020207); 
						$jumlahpusyd020207=$jlhtotpusyd020207[totjlhpusyd020207];
						$totjumlahpusyd020207=number_format($jumlahpusyd020207,0,",",".");
					echo "$totjumlahpusyd020207";
 } ?>