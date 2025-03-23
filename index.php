<?php
$projects = json_decode(file_get_contents('projects.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ArzDev Portfolio Website</title>
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
                    <li class="nav__item"><a href="#resume" class="nav__link">Resume</a></li>
                </ul>
            </nav>
        </header>
        
        <!-- Introduction -->
        <section class="intro" id="home">
            <h1 class="section__title section__title--intro">
                Hello, I am <strong>Abdulrahman Zaatari</strong>
            </h1>
            <p class="section__subtitle section__subtitle--intro">Full Stack Dev</p>
            <img src="img/Headshot2.jpg" alt="A Picture of ARZ" class="intro__img">
        </section>
        
        <section class="my-skills" id="skills">
            <div class="container">
                <h2 class="section__title section__title--skills">My Skills</h2>
                <div class="skills">
                    <div class="skill">
                        <div class="skill-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Full Stack Development</h3>
                        <p>Building scalable web applications with React, Next.js, and TypeScript for frontend, with Java, PHP, Flask, FastAPI, and Django for backend development.</p>
                    </div>
            
                    <div class="skill">
                        <div class="skill-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3>Data Science & AI</h3>
                        <p>Proficient in Python, Pandas, and TensorFlow for AI-driven applications, including NLP and predictive analytics. Experienced with Generative AI and LangChain.</p>
                    </div>
            
                    <div class="skill">
                        <div class="skill-icon">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <h3>Blockchain & Games</h3>
                        <p>Experience with Hive Blockchain and Solidity for decentralized applications. Developed games in Godot using GDScript, focusing on mechanics and user experience.</p>
                    </div>
            </div>
        </section>
        
        <a href="#work" class="btn">My Work</a>
        
        <!-- About Me -->
        <section class="about-me" id="about">
            <h2 class="section__title section__title--about">Who's Abdulrahman?</h2>
            <p class="section__subtitle section__subtitle--about">Software Engineer, AI Enthusiast & Storyteller</p>
            
            <div class="about-me__body">
                <p>I'm a Computer Science student at the Lebanese American University with a minor in data analytics, blending my love for software engineering with a deep passion for AI. 
                    <br>As a recipient of the tomorrow's leaders scholarship offered by the U.S department of state, I'm driven by the pursuit of innovation and the desire to create meaningful experiences through technology.
                    <br>Beyond coding, I'm a storyteller at heart—whether through public speaking, writing, or exploring the power of literature. I believe that technology is more about shaping ideas, solving real-world problems, and making an impact.
                </p>
            </div>
            
            <img src="img/A3.png" alt="Abdulrahman Al-Zaatari" class="about-me__img">
        </section>

        <!-- My Work -->
        <section class="my-work" id="work">
            <h2 class="section__title section__title--work">My Projects</h2>
            <p class="section__subtitle section__subtitle--work">A selection of my range of work</p>

            <div class="portfolio" id="portfolio-container">
                <?php foreach ($projects as $project): ?>
                    <a href="project.php?project=<?php echo $project['id']; ?>" class="portfolio__item">
                        <img src="<?php echo htmlspecialchars($project['images'][0]); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="portfolio__img">
                        <div class="portfolio__title">
                            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="portfolio__tech"><?php echo htmlspecialchars($project['short_description'] ?? ''); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Project Details Container -->
        <div id="project-details-container"></div>

        <!-- Resume Section -->
        <section class="resume-section" id="resume">
            <h2 class="section__title section__title--resume">My Resume</h2>
            <p class="section__subtitle section__subtitle--resume">Check my resume!</p>

            <div class="resume-container">
                <iframe src="Documentation/AbdulrahmanZ.CV.pdf" width="100%" height="600px"></iframe>
            </div>

            <a href="Documentation/AbdulrahmanZ.CV.pdf" class="btn" download>Download Resume</a>
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
