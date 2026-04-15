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
	  
		  
					$totklg0306 =pg_query($koneksi, "select count(nokk) as totjlhklg0306 from keluarga where kodekel='0306'");
						$jlhtotklg0306=pg_fetch_array($totklg0306); 
						$jumlahklg0306=$jlhtotklg0306[totjlhklg0306];
						$totjumlahklg0306=number_format($jumlahklg0306,0,",",".");
					echo "$totjumlahklg0306";
 } ?>