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
	  
		  
					$totmeninggalbayil020207 =pg_query($koneksi, "select sum(meninggalbayil) as totjlhmeninggalbayil020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmeninggalbayil020207=pg_fetch_array($totmeninggalbayil020207); 
						$jumlahmeninggalbayil020207=$jlhtotmeninggalbayil020207[totjlhmeninggalbayil020207];
						$totjumlahmeninggalbayil020207=number_format($jumlahmeninggalbayil020207,0,",",".");
					echo "$totjumlahmeninggalbayil020207";
 } ?>