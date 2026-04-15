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
	  
		  
					$totbumil0103 =pg_query($koneksi, "select sum(bumil) as totjlhbumil0103 from keluarga where kodekel='0103'");
						$jlhtotbumil0103=pg_fetch_array($totbumil0103); 
						$jumlahbumil0103=$jlhtotbumil0103[totjlhbumil0103];
						$totjumlahbumil0103=number_format($jumlahbumil0103,0,",",".");
					echo "$totjumlahbumil0103";
 } ?>