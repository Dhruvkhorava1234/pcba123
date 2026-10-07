/**
 * Pipavav Customs Brokers Association (PCBA)
 * Modern Smooth Frontend Animations & Interaction Engine
 */

document.addEventListener('DOMContentLoaded', () => {
  // -------------------------------------------------------------
  // 0. Maritime Ship Port Arrival Preloader Controller
  // -------------------------------------------------------------
  const preloader = document.getElementById('pcbaPortPreloader');

  if (preloader) {
    const minAnimationTime = 1400; // Optimal smooth sailing arrival duration
    const startTime = Date.now();

    const hidePreloader = () => {
      const elapsed = Date.now() - startTime;
      const remaining = Math.max(0, minAnimationTime - elapsed);

      setTimeout(() => {
        preloader.classList.add('fade-out');
        setTimeout(() => {
          preloader.remove();
          // Trigger initial hero and viewport reveals once preloader is gone
          initScrollReveals();
        }, 700);
      }, remaining);
    };

    if (document.readyState === 'complete') {
      hidePreloader();
    } else {
      window.addEventListener('load', hidePreloader);
      setTimeout(hidePreloader, 2600); // Fail-safe
    }
  } else {
    initScrollReveals();
  }

  // -------------------------------------------------------------
  // 1. Reading / Scroll Progress Bar
  // -------------------------------------------------------------
  let progressBar = document.querySelector('.scroll-progress-bar');
  if (!progressBar) {
    const progressContainer = document.createElement('div');
    progressContainer.className = 'scroll-progress-container';
    progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress-bar';
    progressContainer.appendChild(progressBar);
    document.body.prepend(progressContainer);
  }

  const updateScrollProgress = () => {
    const winScroll = document.documentElement.scrollTop || document.body.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    if (height > 0) {
      const scrolled = (winScroll / height) * 100;
      progressBar.style.width = `${Math.min(100, Math.max(0, scrolled))}%`;
    }
  };

  // -------------------------------------------------------------
  // 2. Sticky Navbar & Back-to-Top Floating Button
  // -------------------------------------------------------------
  const navbar = document.querySelector('.pcba-navbar');
  
  // Inject back to top button if not present
  let backToTopBtn = document.querySelector('.back-to-top-btn');
  if (!backToTopBtn) {
    backToTopBtn = document.createElement('button');
    backToTopBtn.className = 'back-to-top-btn';
    backToTopBtn.setAttribute('aria-label', 'Back to top of page');
    backToTopBtn.innerHTML = '<i class="bi bi-arrow-up"></i>';
    document.body.appendChild(backToTopBtn);

    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  const handleScrollEvents = () => {
    const scrollY = window.scrollY;

    // Sticky Navbar
    if (scrollY > 40) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }

    // Back to top visibility
    if (scrollY > 450) {
      backToTopBtn.classList.add('is-active');
    } else {
      backToTopBtn.classList.remove('is-active');
    }

    // Scroll progress bar
    updateScrollProgress();
  };

  window.addEventListener('scroll', handleScrollEvents, { passive: true });
  handleScrollEvents();

  // -------------------------------------------------------------
  // 3. Smooth IntersectionObserver Scroll Reveal Engine
  // -------------------------------------------------------------
  function initScrollReveals() {
    // Automatically attach reveal class to relevant sections and cards
    const targetSelectors = [
      '.section-lead-title',
      '.pillar-card',
      '.content-box',
      '.card',
      '.president-visual-col',
      '.president-quote-text',
      '.stats-counter-bar'
    ];

    const elementsToReveal = document.querySelectorAll(targetSelectors.join(', '));

    elementsToReveal.forEach((el, index) => {
      if (!el.classList.contains('reveal-on-scroll') && !el.classList.contains('reveal-left') && !el.classList.contains('reveal-right')) {
        el.classList.add('reveal-on-scroll');
        // Add subtle staggered delays for siblings inside rows
        const siblingIndex = Array.from(el.parentElement?.children || []).indexOf(el);
        if (siblingIndex > 0 && siblingIndex <= 4) {
          el.classList.add(`delay-${siblingIndex}`);
        }
      }
    });

    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          // Once animated, keep visible
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    document.querySelectorAll('.reveal-on-scroll, .reveal-left, .reveal-right').forEach(el => {
      revealObserver.observe(el);
    });
  }

  // -------------------------------------------------------------
  // 4. Metric Stat Counter Smooth Easing Animation
  // -------------------------------------------------------------
  const counterElements = document.querySelectorAll('.stat-number [data-target]');
  
  const animateCounter = (el) => {
    const target = parseInt(el.getAttribute('data-target'), 10);
    const duration = 2200; // 2.2s silky smooth deceleration
    const startTime = performance.now();

    const updateValue = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      // Quintic ease-out curve for extra-smooth finish: 1 - (1 - t)^5
      const easeOut = 1 - Math.pow(1 - progress, 5);
      const current = Math.round(target * easeOut);
      
      el.textContent = current;

      if (progress < 1) {
        requestAnimationFrame(updateValue);
      } else {
        el.textContent = target;
      }
    };

    requestAnimationFrame(updateValue);
  };

  const counterObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.25,
    rootMargin: '0px 0px -50px 0px'
  });

  counterElements.forEach(el => counterObserver.observe(el));

  // -------------------------------------------------------------
  // 5. Smooth Anchor Scrolling & Mobile Menu Collapse
  // -------------------------------------------------------------
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link, .hero-actions a, a[href^="#"]');
  const navCollapse = document.getElementById('pcbaNavCollapse');

  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      if (href && href.startsWith('#') && href.length > 1) {
        const targetElement = document.querySelector(href);
        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });

          // Close Bootstrap mobile collapse if open
          if (navCollapse && navCollapse.classList.contains('show')) {
            const bsCollapse = bootstrap.Collapse.getInstance(navCollapse) || new bootstrap.Collapse(navCollapse);
            bsCollapse.hide();
          }
        }
      }
    });
  });
});

