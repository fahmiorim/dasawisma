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
	  
		  
					$totpusyd030207 =pg_query($koneksi, "select sum(pusyd) as totjlhpusyd030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotpusyd030207=pg_fetch_array($totpusyd030207); 
						$jumlahpusyd030207=$jlhtotpusyd030207[totjlhpusyd030207];
						$totjumlahpusyd030207=number_format($jumlahpusyd030207,0,",",".");
					echo "$totjumlahpusyd030207";
 } ?>