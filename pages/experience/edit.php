<?php
require_once '../../config/db.php';
$query = "SELECT * FROM projects ORDER BY tanggal_pembuatan DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Portfolio Admin</title>
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
                        <li class="nav-item"><a class="nav-link text-white-50" href="../experience/index.php"><i class="fas fa-briefcase me-2"></i> Experience</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="index.php"><i class="fas fa-project-diagram me-2"></i> Projects</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../skills/index.php"><i class="fas fa-tools me-2"></i> Skills</a></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Projects</h1>
                    <a href="create.php" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Project</a>
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
                <div class="row">
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <?php if($row['gambar_proyek']): ?>
                                <img src="../../assets/img/projects/<?php echo htmlspecialchars($row['gambar_proyek']); ?>" class="card-img-top" alt="Project" style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-3x text-white"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['judul_proyek']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars(substr($row['deskripsi'], 0, 100)); ?>...</p>
                                <p class="text-muted small"><i class="fas fa-tools"></i> <?php echo htmlspecialchars($row['teknologi']); ?></p>
                                <p class="text-muted small"><i class="fas fa-calendar"></i> <?php echo date('d M Y', strtotime($row['tanggal_pembuatan'])); ?></p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php if(mysqli_num_rows($result) == 0): ?>
                    <div class="col-12">
                        <div class="alert alert-info">Belum ada project</div>
                    </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>