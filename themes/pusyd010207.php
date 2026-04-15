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
	  
		  
					$totpusyd010207 =pg_query($koneksi, "select sum(pusyd) as totjlhpusyd010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotpusyd010207=pg_fetch_array($totpusyd010207); 
						$jumlahpusyd010207=$jlhtotpusyd010207[totjlhpusyd010207];
						$totjumlahpusyd010207=number_format($jumlahpusyd010207,0,",",".");
					echo "$totjumlahpusyd010207";
 } ?>