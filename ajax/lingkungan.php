<?php
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu'); window.location = 'index.php'</script>";
} else {
?>
<?php
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {

        include "../config/koneksi.php";
        $kodekel = isset($_GET['kodekel']) ? $_GET['kodekel'] : '';
        $query = pg_query($koneksi, " SELECT DISTINCT lingkungan from dasawisma where kodekel='$kodekel' AND lingkungan IS NOT NULL AND lingkungan != '' order by lingkungan");
        $jsonResult = '{"data" : [ ';
        $i = 0;
        while ($data = pg_fetch_assoc($query)) {
            if ($i != 0) {
                $jsonResult .= ',';
            }
            $jsonResult .= json_encode($data);
            $i++;
        }
        $jsonResult .= ']}';
        echo $jsonResult;
    } else {
        echo '<script>window.location="../../index.php"</script>';
    }
}
?>
