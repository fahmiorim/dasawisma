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
	  
		  
					$totklg0207 =pg_query($koneksi, "select count(nokk) as totjlhklg0207 from keluarga where kodekel='0207'");
						$jlhtotklg0207=pg_fetch_array($totklg0207); 
						$jumlahklg0207=$jlhtotklg0207[totjlhklg0207];
						$totjumlahklg0207=number_format($jumlahklg0207,0,",",".");
					echo "$totjumlahklg0207";
 } ?>