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
	  
		  
					$totklg0507 =pg_query($koneksi, "select count(nokk) as totjlhklg0507 from keluarga where kodekel='0507'");
						$jlhtotklg0507=pg_fetch_array($totklg0507); 
						$jumlahklg0507=$jlhtotklg0507[totjlhklg0507];
						$totjumlahklg0507=number_format($jumlahklg0507,0,",",".");
					echo "$totjumlahklg0507";
 } ?>