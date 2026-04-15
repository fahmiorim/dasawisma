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
	  
		  
					$totds0202 =pg_query($koneksi, "select count(kode) as totjlhds0202 from dasawisma where kodekel='0202'");
						$jlhtotds0202=pg_fetch_array($totds0202); 
						$jumlahds0202=$jlhtotds0202[totjlhds0202];
						$totjumlahds0202=number_format($jumlahds0202,0,",",".");
					echo "$totjumlahds0202";
 } ?>