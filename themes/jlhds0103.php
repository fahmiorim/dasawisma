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
	  
		  
					$totds0103 =pg_query($koneksi, "select count(kode) as totjlhds0103 from dasawisma where kodekel='0103'");
						$jlhtotds0103=pg_fetch_array($totds0103); 
						$jumlahds0103=$jlhtotds0103[totjlhds0103];
						$totjumlahds0103=number_format($jumlahds0103,0,",",".");
					echo "$totjumlahds0103";
 } ?>