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
	  
		  
					$totplkbl030207 =pg_query($koneksi, "select sum(plkbl) as totjlhplkbl030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotplkbl030207=pg_fetch_array($totplkbl030207); 
						$jumlahplkbl030207=$jlhtotplkbl030207[totjlhplkbl030207];
						$totjumlahplkbl030207=number_format($jumlahplkbl030207,0,",",".");
					echo "$totjumlahplkbl030207";
 } ?>