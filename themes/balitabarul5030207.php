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
	  
		  
					$totbalitabarul5030207 =pg_query($koneksi, "select sum(balitabarul5) as totjlhbalitabarul5030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitabarul5030207=pg_fetch_array($totbalitabarul5030207); 
						$jumlahbalitabarul5030207=$jlhtotbalitabarul5030207[totjlhbalitabarul5030207];
						$totjumlahbalitabarul5030207=number_format($jumlahbalitabarul5030207,0,",",".");
					echo "$totjumlahbalitabarul5030207";
 } ?>