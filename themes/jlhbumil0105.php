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
	  
		  
					$totbumil0105 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0105 from keluarga where kodekel='0105'");
						$jlhtotbumil0105=pg_fetch_array($totbumil0105); 
						$jumlahbumil0105=$jlhtotbumil0105[totjlhbumil0105];
						$totjumlahbumil0105=number_format($jumlahbumil0105,0,",",".");
					echo "$totjumlahbumil0105";
 } ?>