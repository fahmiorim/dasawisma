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
	  
		  
					$totmeninggalbayil030207 =pg_query($koneksi, "select sum(meninggalbayil) as totjlhmeninggalbayil030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmeninggalbayil030207=pg_fetch_array($totmeninggalbayil030207); 
						$jumlahmeninggalbayil030207=$jlhtotmeninggalbayil030207[totjlhmeninggalbayil030207];
						$totjumlahmeninggalbayil030207=number_format($jumlahmeninggalbayil030207,0,",",".");
					echo "$totjumlahmeninggalbayil030207";
 } ?>