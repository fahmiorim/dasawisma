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
	  
		  
					$totbuta30103 =pg_query($koneksi, "select sum(buta3) as totjlhbuta30103 from keluarga where kodekel='0103'");
						$jlhtotbuta30103=pg_fetch_array($totbuta30103); 
						$jumlahbuta30103=$jlhtotbuta30103[totjlhbuta30103];
						$totjumlahbuta30103=number_format($jumlahbuta30103,0,",",".");
					echo "$totjumlahbuta30103";
 } ?>