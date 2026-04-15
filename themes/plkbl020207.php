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
	  
		  
					$totplkbl020207 =pg_query($koneksi, "select sum(plkbl) as totjlhplkbl020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotplkbl020207=pg_fetch_array($totplkbl020207); 
						$jumlahplkbl020207=$jlhtotplkbl020207[totjlhplkbl020207];
						$totjumlahplkbl020207=number_format($jumlahplkbl020207,0,",",".");
					echo "$totjumlahplkbl020207";
 } ?>