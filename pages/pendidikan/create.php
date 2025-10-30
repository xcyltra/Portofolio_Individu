<?php require_once '../../config/db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Education</title>
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
                        <li class="nav-item"><a class="nav-link active text-white" href="index.php"><i class="fas fa-graduation-cap me-2"></i> Education</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../experience/index.php"><i class="fas fa-briefcase me-2"></i> Experience</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../projects/index.php"><i class="fas fa-project-diagram me-2"></i> Projects</a></li>
                        <li class="nav-item"><a class="nav-link text-white-50" href="../skills/index.php"><i class="fas fa-tools me-2"></i> Skills</a></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambah Education</h1>
                    <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Kembali</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="store.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Nama Institusi *</label>
                                <input type="text" class="form-control" name="nama_institusi" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gelar</label>
                                    <input type="text" class="form-control" name="gelar" placeholder="S1, S2, D3, dll">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Masuk</label>
                                    <input type="number" class="form-control" name="tahun_masuk" min="1900" max="2100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Lulus</label>
                                    <input type="number" class="form-control" name="tahun_lulus" min="1900" max="2100">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>