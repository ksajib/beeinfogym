/* == AOS == */
  AOS.init();

/* == PRELOADER == */
window.addEventListener("load", function () {
  const loaderIcon = document.querySelector("#loader .icon");
  const loader = document.querySelector("#loader");

  if (loaderIcon) {
    loaderIcon.style.transition = "opacity 0.3s ease";
    loaderIcon.style.opacity = "0";

    setTimeout(() => {
      loaderIcon.style.display = "none";
    }, 300);
  }

  if (loader) {
    loader.style.transition = "opacity 0.6s ease";

    setTimeout(() => {
      loader.style.opacity = "0";

      setTimeout(() => {
        loader.style.display = "none";
      }, 600);
    }, 300);
  }
});

/* == NAVBAR ACTIVE LINK == */
(function () {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';

  document.querySelectorAll('.desktop-nav a, .mobile-nav-link').forEach(link => {
    const linkPage = link.getAttribute('href').split('/').pop();
    if (linkPage === currentPage) {
      link.classList.add('active');
    }
  });
})();

/* == NAVBAR ON SCROLL == */
const navbar = document.getElementById("navbar");
const logo = document.getElementById("navbar-logo");

window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    navbar.classList.add("active");
    logo.src = "assets/images/logo-light.png";
  } else {
    navbar.classList.remove("active");
  }
});

/* == FEATHER ICONS == */
  feather.replace();

/* == OFFCANVAS CLOSE ON CLICK LINK == */
document.querySelectorAll('.mobile-nav-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault();

    const targetUrl = this.href;

    const offcanvasElement = document.getElementById('mobileMenu');

    // ── GET BOOTSTRAP OFFCANVAS INSTANCE
    const offcanvas =
      bootstrap.Offcanvas.getOrCreateInstance(offcanvasElement);

    // ── CLOSE OFFCANVAS
    offcanvas.hide();

    // ── REDIRECT AFTER ANIMATION
    setTimeout(() => {
      window.location.href = targetUrl;
    }, 300); // ── DEFAULT ANIMATION DURATION
  });
});

/* == ACTIVE TERMS LINK ON SCROLL == */
const sections = document.querySelectorAll('.term-section[id]');
const tocLinks = document.querySelectorAll('.toc-link');

const tocObs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      tocLinks.forEach(l => l.classList.remove('active'));
      const active = document.querySelector(`.toc-link[href="#${e.target.id}"]`);
      if (active) active.classList.add('active');
    }
  });
}, { rootMargin: '-20% 0px -70% 0px' });

sections.forEach(s => tocObs.observe(s));

/* == STICKY SIDEBAR == */
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.querySelector('.toc-sidebar');
  if (!sidebar) return;

  let originalWidth = sidebar.offsetWidth;
  const offsetTop = 100;
  let ghost = null;
  let isMobileView = false;

  function checkMobileView() {
    // Disable sticky on tablets and below (adjust breakpoint as needed)
    isMobileView = window.innerWidth < 992;

    if (isMobileView && ghost) {
      // ── CLEAN UP IF IN MOBILE VIEW
      if (ghost) {
        ghost.remove();
        ghost = null;
      }
      sidebar.style.position = '';
      sidebar.style.top = '';
      sidebar.style.width = '';
      sidebar.style.left = '';
    }
  }

  window.addEventListener('scroll', function() {
    // ── DONT'T RUN STICKY ON MOBILE OR TABLET VIEWS
    if (isMobileView) return;

    const rect = sidebar.parentElement.getBoundingClientRect();
    const shouldStick = rect.top <= offsetTop && rect.bottom > sidebar.offsetHeight + offsetTop;

    if (shouldStick) {
      // ── CREATE GHOST IF NEEDED
      if (!ghost) {
        ghost = document.createElement('div');
        ghost.style.height = sidebar.offsetHeight + 'px';
        sidebar.parentElement.insertBefore(ghost, sidebar);
      }

      // ── MAKE STICKY
      sidebar.style.position = 'fixed';
      sidebar.style.top = offsetTop + 'px';
      sidebar.style.width = originalWidth + 'px';
      sidebar.style.left = rect.left + ((rect.width - originalWidth) / 2) + 'px';
    } else {
      // ── REMOVE STICKY
      if (ghost) {
        ghost.remove();
        ghost = null;
      }
      sidebar.style.position = '';
      sidebar.style.top = '';
      sidebar.style.width = '';
      sidebar.style.left = '';
    }
  });

  window.addEventListener('resize', function() {
    // ── RECALCULATE ORIGINAL WIDTH
    originalWidth = sidebar.offsetWidth;
    // ── CHECK VIEWPORT SIZE
    checkMobileView();
    // ── TRIGGER SCROLL TO RESET POSITION
    window.dispatchEvent(new Event('scroll'));
  });

  // ── INITIAL CHECK
  checkMobileView();
});

/* == BACK TO TOP == */
  const btt = document.getElementById('back-to-top');
  window.addEventListener('scroll', () => btt.classList.toggle('show', window.scrollY > 550));


