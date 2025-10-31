<?php
require_once 'config/db.php';

// Ambil data profile
$query_profile = "SELECT * FROM profile LIMIT 1";
$result_profile = mysqli_query($conn, $query_profile);
$profile = mysqli_fetch_assoc($result_profile);

// Ambil data education
$query_education = "SELECT * FROM education ORDER BY tahun_masuk DESC";
$result_education = mysqli_query($conn, $query_education);

// Ambil data experience
$query_experience = "SELECT * FROM experience ORDER BY tanggal_mulai DESC";
$result_experience = mysqli_query($conn, $query_experience);

// Ambil data projects
$query_projects = "SELECT * FROM projects ORDER BY tanggal_pembuatan DESC";
$result_projects = mysqli_query($conn, $query_projects);

// Ambil data skills
$query_skills = "SELECT * FROM skills ORDER BY kategori, nama_keahlian";
$result_skills = mysqli_query($conn, $query_skills);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($profile['nama_lengkap']); ?> - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home"><?php echo htmlspecialchars($profile['nama_lengkap']); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#education">Education</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-sm btn-outline-light ms-2" href="pages/dashboard.php">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container text-center">
            <div class="hero-content">
                <?php if($profile['foto_profil']): ?>
                    <img src="assets/img/profile/<?php echo htmlspecialchars($profile['foto_profil']); ?>" alt="Profile" class="profile-img mb-4">
                <?php endif; ?>
                <h1 class="display-4 fw-bold text-white mb-3"><?php echo htmlspecialchars($profile['nama_lengkap']); ?></h1>
                <p class="lead text-white-50 mb-4"><?php echo htmlspecialchars($profile['judul_profesi']); ?></p>
                <div class="social-links">
                    <?php if($profile['github']): ?>
                        <a href="<?php echo htmlspecialchars($profile['github']); ?>" target="_blank" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                    <?php endif; ?>
                    <?php if($profile['linkedin']): ?>
                        <a href="<?php echo htmlspecialchars($profile['linkedin']); ?>" target="_blank" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    <?php endif; ?>
                    <?php if($profile['instagram']): ?>
                        <a href="<?php echo htmlspecialchars($profile['instagram']); ?>" target="_blank" class="btn btn-outline-light btn-sm">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">About Me</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-body p-4">
                            <p class="lead"><?php echo nl2br(htmlspecialchars($profile['tentang_saya'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Education</h2>
            <div class="row">
                <?php while($edu = mysqli_fetch_assoc($result_education)): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($edu['nama_institusi']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo htmlspecialchars($edu['gelar']); ?> - <?php echo htmlspecialchars($edu['jurusan']); ?>
                            </h6>
                            <p class="text-muted">
                                <i class="fas fa-calendar"></i> 
                                <?php echo $edu['tahun_masuk']; ?> - <?php echo $edu['tahun_lulus']; ?>
                            </p>
                            <p class="card-text"><?php echo htmlspecialchars($edu['deskripsi']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Experience</h2>
            <div class="timeline">
                <?php while($exp = mysqli_fetch_assoc($result_experience)): ?>
                <div class="timeline-item mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($exp['posisi']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-primary"><?php echo htmlspecialchars($exp['nama_perusahaan']); ?></h6>
                            <p class="text-muted">
                                <i class="fas fa-calendar"></i> 
                                <?php echo date('M Y', strtotime($exp['tanggal_mulai'])); ?> - 
                                <?php echo $exp['masih_bekerja'] ? 'Present' : date('M Y', strtotime($exp['tanggal_selesai'])); ?>
                            </p>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($exp['tanggung_jawab'])); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Projects</h2>
            <div class="row">
                <?php while($project = mysqli_fetch_assoc($result_projects)): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm project-card">
                        <?php if($project['gambar_proyek']): ?>
                            <img src="assets/img/projects/<?php echo htmlspecialchars($project['gambar_proyek']); ?>" class="card-img-top" alt="Project">
                        <?php else: ?>
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-project-diagram fa-3x text-white"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($project['judul_proyek']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($project['deskripsi']); ?></p>
                            <p class="text-muted small">
                                <i class="fas fa-tools"></i> <?php echo htmlspecialchars($project['teknologi']); ?>
                            </p>
                            <div class="mt-3">
                                <?php if($project['link_demo']): ?>
                                    <a href="<?php echo htmlspecialchars($project['link_demo']); ?>" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fas fa-external-link-alt"></i> Demo
                                    </a>
                                <?php endif; ?>
                                <?php if($project['link_repo']): ?>
                                    <a href="<?php echo htmlspecialchars($project['link_repo']); ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="fab fa-github"></i> Repo
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Skills</h2>
            <div class="row">
                <?php 
                $skills_by_category = [];
                mysqli_data_seek($result_skills, 0);
                while($skill = mysqli_fetch_assoc($result_skills)) {
                    $skills_by_category[$skill['kategori']][] = $skill;
                }
                
                foreach($skills_by_category as $category => $skills): 
                ?>
                <div class="col-md-6 mb-4">
                    <h4 class="mb-3"><?php echo htmlspecialchars($category); ?></h4>
                    <?php foreach($skills as $skill): ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span><?php echo htmlspecialchars($skill['nama_keahlian']); ?></span>
                            <span class="badge bg-primary"><?php echo htmlspecialchars($skill['tingkat_kemahiran']); ?></span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: <?php 
                                echo $skill['tingkat_kemahiran'] == 'Advanced' ? '90%' : 
                                     ($skill['tingkat_kemahiran'] == 'Intermediate' ? '70%' : '50%'); 
                            ?>"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-dark text-white">
        <div class="container">
            <h2 class="section-title text-center mb-5">Contact Me</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <?php if($profile['email']): ?>
                        <p class="mb-3">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:<?php echo htmlspecialchars($profile['email']); ?>" class="text-white">
                                <?php echo htmlspecialchars($profile['email']); ?>
                            </a>
                        </p>
                        <?php endif; ?>
                        
                        <?php if($profile['telepon']): ?>
                        <p class="mb-3">
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:<?php echo htmlspecialchars($profile['telepon']); ?>" class="text-white">
                                <?php echo htmlspecialchars($profile['telepon']); ?>
                            </a>
                        </p>
                        <?php endif; ?>
                        
                        <?php if($profile['alamat']): ?>
                        <p class="mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            <?php echo htmlspecialchars($profile['alamat']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($profile['nama_lengkap']); ?>. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>