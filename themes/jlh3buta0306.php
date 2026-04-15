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
	  
		  
					$totbuta30306 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30306 from keluarga where kodekel='0306'");
						$jlhtotbuta30306=pg_fetch_array($totbuta30306); 
						$jumlahbuta30306=$jlhtotbuta30306[totjlhbuta30306];
						$totjumlahbuta30306=number_format($jumlahbuta30306,0,",",".");
					echo "$totjumlahbuta30306";
 } ?>