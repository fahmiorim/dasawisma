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
	  
		  
					$totkaderl020207 =pg_query($koneksi, "select sum(kaderl) as totjlhkaderl020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotkaderl020207=pg_fetch_array($totkaderl020207); 
						$jumlahkaderl020207=$jlhtotkaderl020207[totjlhkaderl020207];
						$totjumlahkaderl020207=number_format($jumlahkaderl020207,0,",",".");
					echo "$totjumlahkaderl020207";
 } ?>