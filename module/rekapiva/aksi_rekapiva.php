<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../404.php'); 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  


  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // Input Data rekapiva
  if ($module=='rekapiva' AND $act=='input'){
      
	  
       $insert = "insert into rekapiva(tglentry,
								  kodekec,
								  namakec,
								  userentry,
								  waktuentry,
								  level,
								  bulan,
								  tahun,
								  kelumur,
								  diperiksa,
								  normal,
								  tumor,
								  curigapayudara,
								  payudara,
								  ivanegatif,
								  ivapositif,
								  curigaiva,
								  kelainan,
								  rahim,
								  kriosama,
								  kriobeda,
								  nobln)
						values('$_POST[tglentry]',
								'$_POST[kodekec]',
								'$_POST[namakec]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[kelumur]',
								'$_POST[diperiksa]',
								'$_POST[normal]',
								'$_POST[tumor]',
								'$_POST[curigapayudara]',
								'$_POST[payudara]',
								'$_POST[ivanegatif]',
								'$_POST[ivapositif]',
								'$_POST[curigaiva]',
								'$_POST[kelainan]',
								'$_POST[rahim]',
								'$_POST[kriosama]',
								'$_POST[kriobeda]',
								'$_POST[nobln]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data Deteksi Dini Kanker Leher Rahim dan Payudara Berhasil Ditambah');
        window.location.href = '../../appmaster.php?module=rekapiva';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
 }
  

  // Update rekapiva
  elseif ($module=='rekapiva' AND $act=='update'){
		 
	
      $update= "UPDATE rekapiva SET	kodekec= '$_POST[kodekec]',
									namakec= '$_POST[namakec]',
									nobln= '$_POST[nobln]',
									bulan= '$_POST[bulan]',
									tahun= '$_POST[tahun]',
									kelumur= '$_POST[kelumur]',
									diperiksa= '$_POST[diperiksa]',
									normal= '$_POST[normal]',
									tumor= '$_POST[tumor]',
									curigapayudara= '$_POST[curigapayudara]',
									payudara= '$_POST[payudara]',
									ivanegatif= '$_POST[ivanegatif]',
									ivapositif= '$_POST[ivapositif]',
									curigaiva= '$_POST[curigaiva]',
									kelainan= '$_POST[kelainan]',
									rahim= '$_POST[rahim]',
									kriosama= '$_POST[kriosama]',
									kriobeda= '$_POST[kriobeda]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
    <script>
        alert('Data Deteksi Dini Kanker Leher Rahim dan Payudara Berhasil update');
        window.location.href = '../../appmaster.php?module=rekapiva';
    </script>
    <?php
	
}
// Close the connection
pg_close($koneksi);
    }
  
}
?>
