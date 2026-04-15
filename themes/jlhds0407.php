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
	  
		  
					$totds0407 =pg_query($koneksi, "select count(kode) as totjlhds0407 from dasawisma where kodekel='0407'");
						$jlhtotds0407=pg_fetch_array($totds0407); 
						$jumlahds0407=$jlhtotds0407[totjlhds0407];
						$totjumlahds0407=number_format($jumlahds0407,0,",",".");
					echo "$totjumlahds0407";
 } ?>