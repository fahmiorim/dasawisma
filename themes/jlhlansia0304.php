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
	  
		  
					$totlansia0304 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0304 from keluarga where kodekel='0304'");
						$jlhtotlansia0304=pg_fetch_array($totlansia0304); 
						$jumlahlansia0304=$jlhtotlansia0304[totjlhlansia0304];
						$totjumlahlansia0304=number_format($jumlahlansia0304,0,",",".");
					echo "$totjumlahlansia0304";
 } ?>