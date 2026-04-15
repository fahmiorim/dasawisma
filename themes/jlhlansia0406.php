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
	  
		  
					$totlansia0406 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0406 from keluarga where kodekel='0406'");
						$jlhtotlansia0406=pg_fetch_array($totlansia0406); 
						$jumlahlansia0406=$jlhtotlansia0406[totjlhlansia0406];
						$totjumlahlansia0406=number_format($jumlahlansia0406,0,",",".");
					echo "$totjumlahlansia0406";
 } ?>