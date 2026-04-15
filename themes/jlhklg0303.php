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
	  
		  
					$totklg0303 =pg_query($koneksi, "select count(nokk) as totjlhklg0303 from keluarga where kodekel='0303'");
						$jlhtotklg0303=pg_fetch_array($totklg0303); 
						$jumlahklg0303=$jlhtotklg0303[totjlhklg0303];
						$totjumlahklg0303=number_format($jumlahklg0303,0,",",".");
					echo "$totjumlahklg0303";
 } ?>