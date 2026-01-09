document.addEventListener("DOMContentLoaded", function () {
  const navBtn = document.getElementById("navBtn");
  const navBar = document.getElementById("navBar");
  const projectsBtn = document.getElementById("projectsBtn");
  const projectsMenu = document.getElementById("projectsMenu");
  const arrow = projectsBtn.querySelector(".arrow");

  // Mobile menu toggle
  navBtn.addEventListener("click", function () {
    navBar.classList.toggle("show");
  });

  // Projects dropdown toggle
  projectsBtn.addEventListener("click", function (e) {
    e.preventDefault();
    projectsMenu.classList.toggle("show");
    arrow.classList.toggle("rotate");
  });

  // Close mobile menu when clicking on non-dropdown links
  const navLinks = navBar.querySelectorAll("a");
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      // Don't close menu if clicking PROJECTS button
      if (this.id === "projectsBtn") {
        return;
      }

      // Close menu on mobile when clicking other links
      if (window.innerWidth < 768) {
        navBar.classList.remove("show");
      }
    });
  });

  // Close menu when clicking outside
  document.addEventListener("click", function (event) {
    const isClickInsideNav = navBar.contains(event.target);
    const isClickOnButton = navBtn.contains(event.target);
    const isClickOnProjectsBtn = projectsBtn.contains(event.target);

    // Close mobile menu
    if (
      !isClickInsideNav &&
      !isClickOnButton &&
      navBar.classList.contains("show")
    ) {
      if (window.innerWidth < 768) {
        navBar.classList.remove("show");
      }
    }

    // Close dropdown on desktop when clicking outside
    if (!isClickOnProjectsBtn && !projectsMenu.contains(event.target)) {
      if (window.innerWidth >= 768) {
        projectsMenu.classList.remove("show");
        arrow.classList.remove("rotate");
      }
    }
  });
});
