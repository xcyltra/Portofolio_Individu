<?php
require_once '../../config/db.php';
$query = "SELECT * FROM experience ORDER BY tanggal_mulai DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience - Portfolio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-md-block bg-dark sidebar" style="min-height: 100vh;">
                <div class="position-sticky pt-3">
                    <h5 class="text-white px-3 mb-3">Portfolio Admin</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white-50" href="../dashboard.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../profile/index.php"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../education/index.php"><i class="fas fa-graduation-cap me-2"></i> Education</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="index.php"><i class="fas fa-briefcase me-2"></i> Experience</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../projects/index.php"><i class="fas fa-project-diagram me-2"></i> Projects</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../skills/index.php"><i class="fas fa-tools me-2"></i> Skills</a></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Experience</h1>
                    <a href="create.php" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Experience</a>
                </div>
                <?php if(isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?php 
                        if($_GET['success'] == 'add') echo 'Data berhasil ditambahkan!';
                        elseif($_GET['success'] == 'edit') echo 'Data berhasil diupdate!';
                        elseif($_GET['success'] == 'delete') echo 'Data berhasil dihapus!';
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Perusahaan</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($result)): 
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($row['posisi']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nama_perusahaan']); ?></td>
                                        <td><?php echo date('M Y', strtotime($row['tanggal_mulai'])) . ' - ' . ($row['masih_bekerja'] ? 'Present' : date('M Y', strtotime($row['tanggal_selesai']))); ?></td>
                                        <td>
                                            <?php if($row['masih_bekerja']): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Finished</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                    <?php if(mysqli_num_rows($result) == 0): ?>
                                    <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>