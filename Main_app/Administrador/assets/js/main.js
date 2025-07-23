/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close');

/* Menu show */
if (navToggle) {
   navToggle.addEventListener('click', (event) => {
      navMenu.classList.add('show-menu');
      event.stopPropagation(); // Evita que el clic se propague al documento
   });
}

/* Menu hidden */
if (navClose) {
   navClose.addEventListener('click', () => {
      navMenu.classList.remove('show-menu');
   });
}

/* Close menu when clicking outside */
document.addEventListener('click', (event) => {
   if (!navMenu.contains(event.target) && !navToggle.contains(event.target)) {
      navMenu.classList.remove('show-menu');
   }
});

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link');

const linkAction = () => {
   navMenu.classList.remove('show-menu');
};
navLink.forEach(n => n.addEventListener('click', linkAction));

/*=============== SHOW DROPDOWN ===============*/
const showDropdown = (dropdownClass) => {
   const dropdowns = document.querySelectorAll(`.${dropdownClass}`);

   dropdowns.forEach(dropdown => {
      dropdown.addEventListener('click', (event) => {
         // Close all other dropdowns
         dropdowns.forEach(otherDropdown => {
            if (otherDropdown !== dropdown) {
               otherDropdown.classList.remove('show-dropdown');
            }
         });

         // Toggle current dropdown
         dropdown.classList.toggle('show-dropdown');
         event.stopPropagation(); // Evita que el clic se propague al documento
      });
   });
};

// Call the function with the class name
showDropdown('dropdown');

/* Close dropdowns when clicking outside */
document.addEventListener('click', (event) => {
   const dropdowns = document.querySelectorAll('.dropdown');
   dropdowns.forEach(dropdown => {
      if (!dropdown.contains(event.target)) {
         dropdown.classList.remove('show-dropdown');
      }
   });
});
