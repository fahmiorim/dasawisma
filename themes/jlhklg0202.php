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
	  
		  
					$totklg0202 =pg_query($koneksi, "select count(nokk) as totjlhklg0202 from keluarga where kodekel='0202'");
						$jlhtotklg0202=pg_fetch_array($totklg0202); 
						$jumlahklg0202=$jlhtotklg0202[totjlhklg0202];
						$totjumlahklg0202=number_format($jumlahklg0202,0,",",".");
					echo "$totjumlahklg0202";
 } ?>