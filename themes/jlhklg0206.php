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
	  
		  
					$totklg0206 =pg_query($koneksi, "select count(nokk) as totjlhklg0206 from keluarga where kodekel='0206'");
						$jlhtotklg0206=pg_fetch_array($totklg0206); 
						$jumlahklg0206=$jlhtotklg0206[totjlhklg0206];
						$totjumlahklg0206=number_format($jumlahklg0206,0,",",".");
					echo "$totjumlahklg0206";
 } ?>