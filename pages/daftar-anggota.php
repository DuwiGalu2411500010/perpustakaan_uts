<?php
//proteksi agar file tidak dapat diakses langsung
if(!defined('MY_APP')) {
    die('Akses langsung tidak diperbolehkan!');
}

$sql = "SELECT * FROM anggota ORDER BY id_anggota DESC";

$result = $mysqli->query($sql);
if(!$result) {
    die("QUERY Error: " . $mysql->error);
}




?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Anggota</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Anggota</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
  <div class="container mt-4">
        <h1>Daftar Data Anggota</h1>
        <a href="index.php?hal=tambah_buku" class="btn btn-primary mb-3">Tambah Anggota</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td ><?php echo $no ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if (!empty($row['foto_profil'])) : ?>
                                            <img src="uploads/users/<?php echo $row['foto_profil']; ?>" 
                                                alt="Cover Buku" 
                                                width="80" height="100" 
                                                style="object-fit: cover; border-radius: 5px; margin-right: 10px;" />
                                        <?php else : ?> 
                                            <div style="width: 60px; height: 80px; background: #ddd; border-radius: 5px; margin-right: 10px; display:flex; 
                                                        align-items:center; justify-content: center; color: #999; text-align:center; font-size:12px;">
                                                No<br>Cover
                                            </div>
                                        <?php endif; ?>   

                                        <div>
                                            <strong><?php echo $row['nama_lengkap']; ?></strong>
                                        </div>
                                    </div>
                                </td>

                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['alamat']?></td>
                                <td><?php echo $row['no_telepon']?></td>
                                <td>
                                    <a href="index.php?hal=ubah-password&id_anggota=<?php echo $row['id_anggota']; ?>" class="btn btn-primary btn-sm"><span class="fas fa-key me-1"></span>Ubah</a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <?php endwhile; 
                            $mysqli->close(); ?>

                </tbody>
         </table>
        </div>
    </div>
</div>