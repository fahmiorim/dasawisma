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
	  
		  
					$tothamil010207 =pg_query($koneksi, "select sum(hamil) as totjlhhamil010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtothamil010207=pg_fetch_array($tothamil010207); 
						$jumlahhamil010207=$jlhtothamil010207[totjlhhamil010207];
						$totjumlahhamil010207=number_format($jumlahhamil010207,0,",",".");
					echo "$totjumlahhamil010207";
 } ?>