// Nav toggle and link click event handling
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelectorAll('.nav__link');

navToggle.addEventListener('click', () => {
    document.body.classList.toggle('nav-open');
});

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        document.body.classList.remove('nav-open');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll(".carousel__img");
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? "block" : "none";
        });
    }

    document.querySelector(".prev").addEventListener("click", () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    });

    document.querySelector(".next").addEventListener("click", () => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    });

    showSlide(currentSlide);
});

document.addEventListener('DOMContentLoaded', function() {
    // Initialize portfolio items
    initPortfolio();
    
    // Function to add interaction to portfolio items
    function initPortfolio() {
        const portfolioItems = document.querySelectorAll('.portfolio__item');
        
        portfolioItems.forEach(item => {
            // Add subtle animation when mouse enters
            item.addEventListener('mouseenter', function() {
                this.classList.add('portfolio__item--active');
            });
            
            // Remove animation when mouse leaves
            item.addEventListener('mouseleave', function() {
                this.classList.remove('portfolio__item--active');
            });
            
            // Add click effect
            item.addEventListener('click', function() {
                // Add a brief highlight effect before navigating
                this.classList.add('portfolio__item--clicked');
                
                // Small delay to show the effect before navigation
                setTimeout(() => {
                    // Navigation happens naturally from the <a> tag
                }, 200);
            });
        });
    }
    
    // Add additional CSS classes dynamically
    const styleElement = document.createElement('style');
    styleElement.textContent = `
        .portfolio__item--active {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        
        .portfolio__item--clicked {
            transform: scale(0.98);
            transition: transform 0.2s ease;
        }
    `;
    document.head.appendChild(styleElement);
});


document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for fade-in sections
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        section.classList.add('section-fade-in');
    });
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                
                // Animate skill bars when skills section is visible
                if (entry.target.id === 'skills') {
                    animateSkillBars();
                }
            }
        });
    }, { threshold: 0.2 });
    
    sections.forEach(section => {
        observer.observe(section);
    });
    
    // Animate skill progress bars
    function animateSkillBars() {
        const progressBars = document.querySelectorAll('.progress-bar__fill');
        progressBars.forEach(bar => {
            const width = bar.getAttribute('data-width');
            setTimeout(() => {
                bar.style.width = width + '%';
            }, 200);
        });
    }
});

