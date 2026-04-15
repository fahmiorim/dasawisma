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
	  
		  
					$totmeninggalbayip030207 =pg_query($koneksi, "select sum(meninggalbayip) as totjlhmeninggalbayip030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmeninggalbayip030207=pg_fetch_array($totmeninggalbayip030207); 
						$jumlahmeninggalbayip030207=$jlhtotmeninggalbayip030207[totjlhmeninggalbayip030207];
						$totjumlahmeninggalbayip030207=number_format($jumlahmeninggalbayip030207,0,",",".");
					echo "$totjumlahmeninggalbayip030207";
 } ?>