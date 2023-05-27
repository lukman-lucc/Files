<?php 
require('data.php');
if(isset($_POST['proses'])){
	define('DB','buku.txt');
	if(!file_exists(DB)){
		simpan(DB,'a');
	}
	$kode = $_GET['kode'];

	$kode = $_POST['kode_buku'];
	$judul = $_POST['judul_buku'];
	$pengarang = $_POST['pengarang'];
	$thn_terbit = $_POST['tahun_terbit'];
	$jml_halaman = $_POST['jml_halaman'];
	$penerbit = $_POST['penerbit'];
	$kategori = $_POST['kategori'];
	$cover_url = $_POST['cover_url'];
	$dataLast = edit($_GET['kode']);
    if(!empty($cover_url)){
        $content = str_replace($dataLast,"$kode|$judul|$pengarang|$thn_terbit|$jml_halaman|$penerbit|$kategori|$cover_url|",file_get_contents(DB));
    } else {
        $content = str_replace($dataLast,"$kode|$judul|$pengarang|$thn_terbit|$jml_halaman|$penerbit|$kategori|$cover_file|",file_get_contents(DB));
    }
    
	simpan(DB,$content,'w');
	
    header('location:update.php' );

    
}

if(!empty($_GET['kode'])){
	$data = edit($_GET['kode']);
	$buku = explode('|',$data);
	$kode = $buku[0];
	$judul = $buku[1];
	$pengarang = $buku[2];
	$thn_terbit = $buku[3];
	$jml_halaman = $buku[4];
	$penerbit = $buku[5];
	$kategori = $buku[6];
	$cover = $buku[7];
	
}

function edit($kode){
	$db = 'buku.txt';
	$load = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($load as $data){
		$buku = explode('|',$data);
		$kode_buku = $buku[0];
		if($kode_buku==$kode){
			break;
		}else{
			$data = null;
		}
		
	}
	
return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <style> body {
        background-color : grey; }
        .update {
            background-color : yellow;}</style>
</head>
<body>
    <div class="update">
                <header>
                    <h3>UPDATE DATA</h3>
                </header>
                <form action="" method="POST">
                    <fieldset>
                        <legend>Form Data Buku</legend>
                        <table>
                            <tr>
                                <td>Kode Buku</td>
                                <td> : </td>
                                <td><input type="text" name="kode_buku" value="<?=$kode;?>" required></td>
                            </tr>
                            <tr>
                                <td>Judul Buku</td>
                                <td> : </td>
                                <td><input type="text" name="judul_buku" value="<?=$judul;?>" required></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td> : </td>
                                <td><input type="text" name="pengarang" value="<?=$pengarang;?>" required></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td> : </td>
                                <td><input type="text" name="tahun_terbit" value="<?=$thn_terbit;?>" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td> : </td>
                                <td><input type="text" name="jml_halaman" value="<?=$jml_halaman;?>" required></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td> : </td>
                                <td><input type="text" name="penerbit" value="<?=$penerbit;?>" required></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> : </td>
                                <td><input type="text" name="kategori" value="<?=$kategori;?>" required></td>
                            </tr>
                            <tr>
                                <td>Cover</td>
                                <td> : </td>
                                <td><input a href="" name="cover_url" value="<?=$cover;?>" required></td>
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
