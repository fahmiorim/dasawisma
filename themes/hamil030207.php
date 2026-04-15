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
	  
		  
					$tothamil030207 =pg_query($koneksi, "select sum(hamil) as totjlhhamil030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtothamil030207=pg_fetch_array($tothamil030207); 
						$jumlahhamil030207=$jlhtothamil030207[totjlhhamil030207];
						$totjumlahhamil030207=number_format($jumlahhamil030207,0,",",".");
					echo "$totjumlahhamil030207";
 } ?>