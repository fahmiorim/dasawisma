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
	  
		  
					$totklg0102 =pg_query($koneksi, "select count(nokk) as totjlhklg0102 from keluarga where kodekel='0102'");
						$jlhtotklg0102=pg_fetch_array($totklg0102); 
						$jumlahklg0102=$jlhtotklg0102[totjlhklg0102];
						$totjumlahklg0102=number_format($jumlahklg0102,0,",",".");
					echo "$totjumlahklg0102";
 } ?>