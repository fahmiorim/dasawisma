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
	  
		  
					$totklg0103 =pg_query($koneksi, "select count(nokk) as totjlhklg0103 from keluarga where kodekel='0103'");
						$jlhtotklg0103=pg_fetch_array($totklg0103); 
						$jumlahklg0103=$jlhtotklg0103[totjlhklg0103];
						$totjumlahklg0103=number_format($jumlahklg0103,0,",",".");
					echo "$totjumlahklg0103";
 } ?>