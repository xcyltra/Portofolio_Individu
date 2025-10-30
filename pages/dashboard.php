<?php
require_once '../config/db.php';

// Hitung jumlah data
$count_education = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM education"));
$count_experience = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM experience"));
$count_projects = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM projects"));
$count_skills = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM skills"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Portfolio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                            <a class="nav-link active" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile/index.php">
                                <i class="fas fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="education/index.php">
                                <i class="fas fa-graduation-cap me-2"></i> Education
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="experience/index.php">
                                <i class="fas fa-briefcase me-2"></i> Experience
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="projects/index.php">
                                <i class="fas fa-project-diagram me-2"></i> Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="skills/index.php">
                                <i class="fas fa-tools me-2"></i> Skills
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link text-danger" href="../index.php">
                                <i class="fas fa-home me-2"></i> Kembali ke Portfolio
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Education</h6>
                                        <h2 class="mb-0"><?php echo $count_education; ?></h2>
                                    </div>
                                    <i class="fas fa-graduation-cap fa-3x opacity-50"></i>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="education/index.php" class="text-white text-decoration-none">
                                    Lihat Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Experience</h6>
                                        <h2 class="mb-0"><?php echo $count_experience; ?></h2>
                                    </div>
                                    <i class="fas fa-briefcase fa-3x opacity-50"></i>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="experience/index.php" class="text-white text-decoration-none">
                                    Lihat Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Projects</h6>
                                        <h2 class="mb-0"><?php echo $count_projects; ?></h2>
                                    </div>
                                    <i class="fas fa-project-diagram fa-3x opacity-50"></i>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="projects/index.php" class="text-white text-decoration-none">
                                    Lihat Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Skills</h6>
                                        <h2 class="mb-0"><?php echo $count_skills; ?></h2>
                                    </div>
                                    <i class="fas fa-tools fa-3x opacity-50"></i>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="skills/index.php" class="text-white text-decoration-none">
                                    Lihat Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h5 class="mb-0">Quick Access</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="list-group">
                                            <a href="profile/index.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-user me-2"></i> Edit Profile
                                            </a>
                                            <a href="education/create.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-plus me-2"></i> Tambah Education
                                            </a>
                                            <a href="experience/create.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-plus me-2"></i> Tambah Experience
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="list-group">
                                            <a href="projects/create.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-plus me-2"></i> Tambah Project
                                            </a>
                                            <a href="skills/create.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-plus me-2"></i> Tambah Skill
                                            </a>
                                            <a href="../index.php" class="list-group-item list-group-item-action">
                                                <i class="fas fa-eye me-2"></i> Lihat Portfolio
                                            </a>
                                        </div>
                                    </div>
                                </div>
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