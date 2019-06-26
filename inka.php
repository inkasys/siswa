<?php
    $koneksi = mysqli_connect("localhost", "root", "", "siswa");

    if($koneksi){

    }else{
        echo "Aduh, gagal nih gan";
    }
?>

<h3 >Masukan Data Siswa</h3>

<form action="" method="post">
<table border="1">
<table  bgcolor="">
    
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="Alamat"></td>
    </tr>
    <tr>
        <td>No Telepon</td>
        <td>:</td>
        <td><input type="text" name="No_Telpon"></td>
    </tr>
    <tr>
        <td>
            <input  type="submit" name="Registrasi" value="Registrasi">
        </td>
    </tr>
</table >
  
        
</form>
<h4 >Data Diri Siswa/(i) </h4>
<table  border="1" >
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `tb_siswa`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            
            
            <td>
                <a href="inka.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>
</table>

<?php
    if(isset($_POST['Registrasi'])){
        $sqlInput = "INSERT INTO `tb_siswa` (`Nama`,`Alamat`,`No_Telpon`)
                VALUES ('$_POST[Nama]', '$_POST[Alamat]', '$_POST[No_Telpon]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){

            echo "<script> window.location = 'inka.php' </script>";
        }else{
            echo "Maaf Data Yang Anda Masukan Valid";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `tb_siswa` WHERE
        `tb_siswa`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            
            echo "<script> window.location = 'inka.php' </script>";
        }else{
            echo "Maaf Data Yang Anda Masukan Valid";
        }
    }
?>