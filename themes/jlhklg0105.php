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
	  
		  
					$totklg0105 =pg_query($koneksi, "select count(nokk) as totjlhklg0105 from keluarga where kodekel='0105'");
						$jlhtotklg0105=pg_fetch_array($totklg0105); 
						$jumlahklg0105=$jlhtotklg0105[totjlhklg0105];
						$totjumlahklg0105=number_format($jumlahklg0105,0,",",".");
					echo "$totjumlahklg0105";
 } ?>