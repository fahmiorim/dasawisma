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
	  
		  
					$totklg0304 =pg_query($koneksi, "select count(nokk) as totjlhklg0304 from keluarga where kodekel='0304'");
						$jlhtotklg0304=pg_fetch_array($totklg0304); 
						$jumlahklg0304=$jlhtotklg0304[totjlhklg0304];
						$totjumlahklg0304=number_format($jumlahklg0304,0,",",".");
					echo "$totjumlahklg0304";
 } ?>