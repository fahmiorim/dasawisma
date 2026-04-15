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
	  
		  
					$totds0306 =pg_query($koneksi, "select count(kode) as totjlhds0306 from dasawisma where kodekel='0306'");
						$jlhtotds0306=pg_fetch_array($totds0306); 
						$jumlahds0306=$jlhtotds0306[totjlhds0306];
						$totjumlahds0306=number_format($jumlahds0306,0,",",".");
					echo "$totjumlahds0306";
 } ?>