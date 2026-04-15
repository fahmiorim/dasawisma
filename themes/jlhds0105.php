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
	  
		  
					$totds0105 =pg_query($koneksi, "select count(kode) as totjlhds0105 from dasawisma where kodekel='0105'");
						$jlhtotds0105=pg_fetch_array($totds0105); 
						$jumlahds0105=$jlhtotds0105[totjlhds0105];
						$totjumlahds0105=number_format($jumlahds0105,0,",",".");
					echo "$totjumlahds0105";
 } ?>