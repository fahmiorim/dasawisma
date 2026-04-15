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
	  
		  
					$totlansia0305 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0305 from keluarga where kodekel='0305'");
						$jlhtotlansia0305=pg_fetch_array($totlansia0305); 
						$jumlahlansia0305=$jlhtotlansia0305[totjlhlansia0305];
						$totjumlahlansia0305=number_format($jumlahlansia0305,0,",",".");
					echo "$totjumlahlansia0305";
 } ?>