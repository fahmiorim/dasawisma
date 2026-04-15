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
	  
		  
					$totwusyd020207 =pg_query($koneksi, "select sum(wusyd) as totjlhwusyd020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotwusyd020207=pg_fetch_array($totwusyd020207); 
						$jumlahwusyd020207=$jlhtotwusyd020207[totjlhwusyd020207];
						$totjumlahwusyd020207=number_format($jumlahwusyd020207,0,",",".");
					echo "$totjumlahwusyd020207";
 } ?>