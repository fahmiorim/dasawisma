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
	  
		  
					$totklg0501 =pg_query($koneksi, "select count(nokk) as totjlhklg0501 from keluarga where kodekel='0501'");
						$jlhtotklg0501=pg_fetch_array($totklg0501); 
						$jumlahklg0501=$jlhtotklg0501[totjlhklg0501];
						$totjumlahklg0501=number_format($jumlahklg0501,0,",",".");
					echo "$totjumlahklg0501";
 } ?>