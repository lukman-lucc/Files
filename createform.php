<?php 
require('data.php');
if(isset($_POST['proses'])){
	define('DB','buku.txt');
	if(!file_exists(DB)){
		simpan(DB,"kode buku|judul buku|pengarang|tahun terbit|jumlah halaman|penerbit|kategori|cover|".PHP_EOL,'a');
	}
	$load = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$kode_buku = $_POST['kode_buku'];
	$judul_buku = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$tahun_terbit = $_POST['tahun_terbit'];
	$jml_halaman = $_POST['jml_halaman'];
	$penerbit = $_POST['penerbit'];
	$kategori = $_POST['kategori'];
    $cover = $_POST['cover'];
    if(empty($cover_href)){
	    simpan(DB,"$kode_buku|$judul_buku|$pengarang|$tahun_terbit|$jml_halaman|$penerbit|$kategori|$cover|".PHP_EOL,'a');
    }
    echo "Data berhasil disimpan";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <style> body {
        background-color : grey; 
    }
    .form {
        background-color : yellow;
    }</style>
</head>
<body>
<div class="form">
<header>
    <h3>CREATE DATA</h3>
                </header>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Form Data Buku</legend>
                        <table>
                            <tr>
                                <td>Kode Buku</td>
                                <td> : </td>
                                <td><input type="text" name="kode_buku" required></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td> : </td>
                                <td><input type="text" name="judul_buku" required></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td> : </td>
                                <td><input type="text" name="pengarang" required></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td> : </td>
                                <td><input type="text" name="tahun_terbit" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td> : </td>
                                <td><input type="text" name="jml_halaman" required></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td> : </td>
                                <td><input type="text" name="penerbit" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> : </td>
                                <td><input type="text" name="kategori" required></td>
                            </tr>
                            <tr>
                                <td>Cover (Gambar yang tersedia di file)</td>
                                <td> : </td>
                                <td><input a href="" name="cover" ></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Simpan" name="proses">
                                </td>
                            </tr>
                        </table>
                </fieldset>
                </form>
                </div>
                <a href="index.php">KEMBALI KE MENU</a>
</body>
</html>