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
	  
		  
					$totds0508 =pg_query($koneksi, "select count(kode) as totjlhds0508 from dasawisma where kodekel='0508'");
						$jlhtotds0508=pg_fetch_array($totds0508); 
						$jumlahds0508=$jlhtotds0508[totjlhds0508];
						$totjumlahds0508=number_format($jumlahds0508,0,",",".");
					echo "$totjumlahds0508";
 } ?>