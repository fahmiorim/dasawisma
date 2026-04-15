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
	  
		  
					$totklg0204 =pg_query($koneksi, "select count(nokk) as totjlhklg0204 from keluarga where kodekel='0204'");
						$jlhtotklg0204=pg_fetch_array($totklg0204); 
						$jumlahklg0204=$jlhtotklg0204[totjlhklg0204];
						$totjumlahklg0204=number_format($jumlahklg0204,0,",",".");
					echo "$totjumlahklg0204";
 } ?>