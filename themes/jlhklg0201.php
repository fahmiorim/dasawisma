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
	  
		  
					$totklg0201 =pg_query($koneksi, "select count(nokk) as totjlhklg0201 from keluarga where kodekel='0201'");
						$jlhtotklg0201=pg_fetch_array($totklg0201); 
						$jumlahklg0201=$jlhtotklg0201[totjlhklg0201];
						$totjumlahklg0201=number_format($jumlahklg0201,0,",",".");
					echo "$totjumlahklg0201";
 } ?>