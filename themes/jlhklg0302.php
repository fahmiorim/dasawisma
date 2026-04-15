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
	  
		  
					$totklg0302 =pg_query($koneksi, "select count(nokk) as totjlhklg0302 from keluarga where kodekel='0302'");
						$jlhtotklg0302=pg_fetch_array($totklg0302); 
						$jumlahklg0302=$jlhtotklg0302[totjlhklg0302];
						$totjumlahklg0302=number_format($jumlahklg0302,0,",",".");
					echo "$totjumlahklg0302";
 } ?>