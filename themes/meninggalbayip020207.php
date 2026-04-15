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
	  
		  
					$totmeninggalbayip020207 =pg_query($koneksi, "select sum(meninggalbayip) as totjlhmeninggalbayip020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmeninggalbayip020207=pg_fetch_array($totmeninggalbayip020207); 
						$jumlahmeninggalbayip020207=$jlhtotmeninggalbayip020207[totjlhmeninggalbayip020207];
						$totjumlahmeninggalbayip020207=number_format($jumlahmeninggalbayip020207,0,",",".");
					echo "$totjumlahmeninggalbayip020207";
 } ?>