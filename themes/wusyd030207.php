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
	  
		  
					$totwusyd030207 =pg_query($koneksi, "select sum(wusyd) as totjlhwusyd030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotwusyd030207=pg_fetch_array($totwusyd030207); 
						$jumlahwusyd030207=$jlhtotwusyd030207[totjlhwusyd030207];
						$totjumlahwusyd030207=number_format($jumlahwusyd030207,0,",",".");
					echo "$totjumlahwusyd030207";
 } ?>