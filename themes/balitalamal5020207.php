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
	  
		  
					$totbalitalamal5020207 =pg_query($koneksi, "select sum(balitalamal5) as totjlhbalitalamal5020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitalamal5020207=pg_fetch_array($totbalitalamal5020207); 
						$jumlahbalitalamal5020207=$jlhtotbalitalamal5020207[totjlhbalitalamal5020207];
						$totjumlahbalitalamal5020207=number_format($jumlahbalitalamal5020207,0,",",".");
					echo "$totjumlahbalitalamal5020207";
 } ?>