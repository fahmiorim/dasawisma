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
	  
		  
					$totmeninggalbayil010207 =pg_query($koneksi, "select sum(meninggalbayil) as totjlhmeninggalbayil010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotmeninggalbayil010207=pg_fetch_array($totmeninggalbayil010207); 
						$jumlahmeninggalbayil010207=$jlhtotmeninggalbayil010207[totjlhmeninggalbayil010207];
						$totjumlahmeninggalbayil010207=number_format($jumlahmeninggalbayil010207,0,",",".");
					echo "$totjumlahmeninggalbayil010207";
 } ?>