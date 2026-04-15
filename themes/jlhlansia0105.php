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
	  
		  
					$totlansia0105 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0105 from keluarga where kodekel='0105'");
						$jlhtotlansia0105=pg_fetch_array($totlansia0105); 
						$jumlahlansia0105=$jlhtotlansia0105[totjlhlansia0105];
						$totjumlahlansia0105=number_format($jumlahlansia0105,0,",",".");
					echo "$totjumlahlansia0105";
 } ?>