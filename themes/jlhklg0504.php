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
	  
		  
					$totklg0504 =pg_query($koneksi, "select count(nokk) as totjlhklg0504 from keluarga where kodekel='0504'");
						$jlhtotklg0504=pg_fetch_array($totklg0504); 
						$jumlahklg0504=$jlhtotklg0504[totjlhklg0504];
						$totjumlahklg0504=number_format($jumlahklg0504,0,",",".");
					echo "$totjumlahklg0504";
 } ?>