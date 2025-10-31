<?php
require_once '../../config/db.php';

// Ambil data profile
$query = "SELECT * FROM profile LIMIT 1";
$result = mysqli_query($conn, $query);
$profile = mysqli_fetch_assoc($result);

// Jika belum ada data, insert default
if(!$profile) {
    mysqli_query($conn, "INSERT INTO profile (nama_lengkap, email) VALUES ('Nama Anda', 'email@example.com')");
    $result = mysqli_query($conn, $query);
    $profile = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Portfolio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block bg-dark sidebar">
                <div class="position-sticky pt-3">
                    <h5 class="text-white px-3 mb-3">Portfolio Admin</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="../dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../education/index.php">
                                <i class="fas fa-graduation-cap me-2"></i> Education
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../experience/index.php">
                                <i class="fas fa-briefcase me-2"></i> Experience
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../projects/index.php">
                                <i class="fas fa-project-diagram me-2"></i> Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../skills/index.php">
                                <i class="fas fa-tools me-2"></i> Skills
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Profile</h1>
                    <a href="../../index.php" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-home me-1"></i> Kembali ke Portfolio
                    </a>
                </div>

                <?php if(isset($_GET['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Profile berhasil diupdate!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <form action="update.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nama Lengkap *</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?php echo htmlspecialchars($profile['nama_lengkap']); ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Judul Profesi</label>
                                            <input type="text" class="form-control" name="judul_profesi" value="<?php echo htmlspecialchars($profile['judul_profesi']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tentang Saya</label>
                                        <textarea class="form-control" name="tentang_saya" rows="4"><?php echo htmlspecialchars($profile['tentang_saya']); ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($profile['email']); ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Telepon</label>
                                            <input type="text" class="form-control" name="telepon" value="<?php echo htmlspecialchars($profile['telepon']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="2"><?php echo htmlspecialchars($profile['alamat']); ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">GitHub URL</label>
                                            <input type="url" class="form-control" name="github" value="<?php echo htmlspecialchars($profile['github']); ?>" placeholder="https://github.com/username">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">LinkedIn URL</label>
                                            <input type="url" class="form-control" name="linkedin" value="<?php echo htmlspecialchars($profile['linkedin']); ?>" placeholder="https://linkedin.com/in/username">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Instagram URL</label>
                                            <input type="url" class="form-control" name="instagram" value="<?php echo htmlspecialchars($profile['instagram']); ?>" placeholder="https://instagram.com/username">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Foto Profil</label>
                                        <?php if($profile['foto_profil']): ?>
                                            <div class="mb-2">
                                                <img src="../../assets/img/profile/<?php echo htmlspecialchars($profile['foto_profil']); ?>" alt="Profile" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" class="form-control" name="foto_profil" accept="image/*">
                                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>