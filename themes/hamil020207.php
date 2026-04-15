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
	  
		  
					$tothamil020207 =pg_query($koneksi, "select sum(hamil) as totjlhhamil020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtothamil020207=pg_fetch_array($tothamil020207); 
						$jumlahhamil020207=$jlhtothamil020207[totjlhhamil020207];
						$totjumlahhamil020207=number_format($jumlahhamil020207,0,",",".");
					echo "$totjumlahhamil020207";
 } ?>