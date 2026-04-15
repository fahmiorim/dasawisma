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
	  
		  
					$totklg0101 =pg_query($koneksi, "select count(nokk) as totjlhklg0101 from keluarga where kodekel='0101'");
						$jlhtotklg0101=pg_fetch_array($totklg0101); 
						$jumlahklg0101=$jlhtotklg0101[totjlhklg0101];
						$totjumlahklg0101=number_format($jumlahklg0101,0,",",".");
					echo "$totjumlahklg0101";
 } ?>