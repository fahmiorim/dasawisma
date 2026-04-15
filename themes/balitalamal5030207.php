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
	  
		  
					$totbalitalamal5030207 =pg_query($koneksi, "select sum(balitalamal5) as totjlhbalitalamal5030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitalamal5030207=pg_fetch_array($totbalitalamal5030207); 
						$jumlahbalitalamal5030207=$jlhtotbalitalamal5030207[totjlhbalitalamal5030207];
						$totjumlahbalitalamal5030207=number_format($jumlahbalitalamal5030207,0,",",".");
					echo "$totjumlahbalitalamal5030207";
 } ?>