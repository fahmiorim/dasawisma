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
	  
		  
					$totklg0407 =pg_query($koneksi, "select count(nokk) as totjlhklg0407 from keluarga where kodekel='0407'");
						$jlhtotklg0407=pg_fetch_array($totklg0407); 
						$jumlahklg0407=$jlhtotklg0407[totjlhklg0407];
						$totjumlahklg0407=number_format($jumlahklg0407,0,",",".");
					echo "$totjumlahklg0407";
 } ?>