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
	  
		  
					$totkaderp020207 =pg_query($koneksi, "select sum(kaderp) as totjlhkaderp020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotkaderp020207=pg_fetch_array($totkaderp020207); 
						$jumlahkaderp020207=$jlhtotkaderp020207[totjlhkaderp020207];
						$totjumlahkaderp020207=number_format($jumlahkaderp020207,0,",",".");
					echo "$totjumlahkaderp020207";
 } ?>