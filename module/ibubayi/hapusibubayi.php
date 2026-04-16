<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../../404.php');
} else {

    switch ($_GET['act']) {
            // Tampil List View
        default:

            if (!isset($_GET['id']) || $_GET['id'] == "") {

?>

                <script>
                    alert('Data tidak ditemukan');
                    window.location.href = 'appmaster.php?module=ibubayi';
                </script>
                <?php
            } else {
                $id = $_GET['id'];
                $sql = pg_query($koneksi, "DELETE FROM ibubayi WHERE id=" . $id);

                if ($sql) {
                ?>
                    <script>
                        alert('Data berhasil dihapus');
                        window.location.href = 'appmaster.php?module=ibubayi';
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert('Error while Deleting , TRY AGAIN');
                        window.location.href = 'appmaster.php?module=ibubayi';
                    </script>
<?php
                }
            }
    }
}
?>