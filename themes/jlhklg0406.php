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
	  
		  
					$totklg0406 =pg_query($koneksi, "select count(nokk) as totjlhklg0406 from keluarga where kodekel='0406'");
						$jlhtotklg0406=pg_fetch_array($totklg0406); 
						$jumlahklg0406=$jlhtotklg0406[totjlhklg0406];
						$totjumlahklg0406=number_format($jumlahklg0406,0,",",".");
					echo "$totjumlahklg0406";
 } ?>