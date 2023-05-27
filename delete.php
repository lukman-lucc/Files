<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style> body {
        background-color : grey;
        .delete {
            background-color : yellow }</style>
</head>
<body>
    <div class="delete">
<header>
                <h3>DELETE</h3>
                </header>
                    <table border=1>
                        <thead>
                            <tr>
								<th>Delete</th>
                                <th>No.</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Jumlah Halaman</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>
                                <th>Cover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require('data.php');
                                define('DB','buku.txt');
                                if(!file_exists(DB)){
                                    simpan(DB, 'a');
                                }
                                $load = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                $no = 1;
                                foreach($load as $data){
                                        $buku = explode('|',$data);
                                        $index = count($buku);
                                        $last_index = $index-2;
                                        echo "<tr>";
                                            echo    "<td>
                                                        <a href='simpandelete.php?kode=$buku[0]'>Hapus</a>
                                                    </td>";
                                            echo    "<td>$no</td>";
                                                    for($i = 0; $i < $index-2; $i++){
                                                        echo "<td>$buku[$i]</td>";
                                                    }
                                            echo    "<td>
                                                        <a href='$buku[$last_index]' target='$buku[$last_index]'>
                                                            $buku[$last_index]
                                                        </a>
                                                    </td>";
                                        echo "</tr>";
                            ?>
                            <?php 
                                        $no++;
                                    }
                            ?>
                        </tbody>
                    </table>
                                </div>
                    <a href="index.php">KEMBALI KE MENU</a>
</body>
</html>