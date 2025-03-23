<?php
$projects = json_decode(file_get_contents('projects.json'), true);
$projectId = $_GET['project'] ?? null;

// If no project ID is provided or the project ID doesn't exist, redirect to the homepage
if (!$projectId || !array_key_exists($projectId, array_column($projects, 'id', 'id'))) {
    header('Location: index.php');
    exit();
}

// Find the selected project by its ID
$selectedProject = null;
foreach ($projects as $project) {
    if ($project['id'] === $projectId) {
        $selectedProject = $project;
        break;
    }
}

// If the project is not found, redirect to the homepage
if (!$selectedProject) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details - <?php echo htmlspecialchars($selectedProject['title']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto+Slab:400,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/" alt="">
        </div>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">My Services</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">About me</a></li>
                <li class="nav__item"><a href="#work" class="nav__link">My Work</a></li>
            </ul>
        </nav>
    </header>

    <!-- Project Details Section -->
    <section class="project-details">
    <h1 class="section__title"><?php echo htmlspecialchars($selectedProject['title']); ?></h1>
    <!-- Image Carousel -->
    <div class="carousel">
        <?php foreach ($selectedProject['images'] as $image) : ?>
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($selectedProject['title']); ?>" class="carousel__img">
        <?php endforeach; ?>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </div>

    <p class="project-details__description"><?php echo htmlspecialchars($selectedProject['description']); ?></p>
     <!-- GitHub Link Button -->
     <a href="<?php echo htmlspecialchars($selectedProject['github']); ?>" class="github-btn" target="_blank">
        <i class="fab fa-github"></i> View on GitHub
    </a>
     <!-- Itch.io Link (Only for games) -->
     <?php if (isset($selectedProject['itch_io'])) : ?>
        <a href="<?php echo htmlspecialchars($selectedProject['itch_io']); ?>" class="itchio-btn" target="_blank">
            <i class="fas fa-gamepad"></i> Play on Itch.io
        </a>
    <?php endif; ?>

    <!-- Documentation Link (Only if available) -->
    <?php if (isset($selectedProject['documentation'])) : ?>
        <a href="<?php echo htmlspecialchars($selectedProject['documentation']); ?>" class="doc-btn" target="_blank">
            <i class="fas fa-file-pdf"></i> View Documentation
        </a>
    <?php endif; ?>
</section>


    <!-- Footer -->
    <footer class="footer">
        <a href="mailto:zaatariabdulrahman@gmail.com" class="footer__link">zaatariabdulrahman@gmail.com</a>
        <ul class="social-list">
            <li class="social-list__item">
                <a class="social-list__link" href="https://www.linkedin.com/in/abdulrahman-al-zaatari-540470257/">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li class="social-list__item">
                <a class="social-list__link" href="https://github.com/AbdulrahmanZaatari?tab=repositories">
                    <i class="fab fa-github"></i>
                </a>
            </li>
        </ul>
    </footer>
    <script src="js/index.js"></script>
</body>
</html>
