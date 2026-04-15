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
	  
		  
					$totklg0402 =pg_query($koneksi, "select count(nokk) as totjlhklg0402 from keluarga where kodekel='0402'");
						$jlhtotklg0402=pg_fetch_array($totklg0402); 
						$jumlahklg0402=$jlhtotklg0402[totjlhklg0402];
						$totjumlahklg0402=number_format($jumlahklg0402,0,",",".");
					echo "$totjumlahklg0402";
 } ?>