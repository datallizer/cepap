// const header = document.querySelector('.navbar');

// window.addEventListener('scroll', () => {
//     const scrollPos = window.scrollY;
//     if (scrollPos > 10 ) {
//         header.classList.add('scrolled','shadow','navbarbg');
//     }
//     else {
//         header.classList.remove('scrolled','shadow','navbarbg');
//     }
// });

const offcanvasNavbar = document.getElementById('offcanvasNavbar');
const navbar = document.querySelector('.navbar');

// Observar cambios en el atributo aria-modal
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    const ariaModalValue = mutation.target.getAttribute('aria-modal');

    if (ariaModalValue === 'true') {
      navbar.style.backdropFilter = 'none'; // Eliminar el efecto de desenfoque
    } else {
      navbar.style.backdropFilter = 'blur(5px)'; // Restaurar el efecto de desenfoque
    }
  });
});

const observerConfig = { attributes: true };
observer.observe(offcanvasNavbar, observerConfig);

const header = document.querySelector('.navbar');
const drop = document.querySelector('.dropdown-menu');

window.addEventListener('scroll', () => {
  const scrollPos = window.scrollY;
  if (scrollPos > 10) {
    header.classList.add('scrolled', 'shadow');
    drop.classList.add('scrolled', 'shadow');
  }
  else {
    header.classList.remove('scrolled', 'shadow');
    drop.classList.remove('scrolled', 'shadow');
  }
});

$("#offcanvasNavbar a").click(function () {
  $('.offcanvas').offcanvas('hide');
});

function abrirMenuDesplegable() {
  var dropdownMenu = document.querySelector('.dropdown-menu');
  dropdownMenu.style.display = 'block';
}

function cerrarMenuDesplegable() {
  var dropdownMenu = document.querySelector('.dropdown-menu');
  dropdownMenu.style.display = 'none';
}

function abrirMenuDesplegableDos() {
    var dropdownMenu = document.querySelector('.dropdown-menuDos');
    dropdownMenu.style.display = 'block';
  }
  
  function cerrarMenuDesplegableDos() {
    var dropdownMenu = document.querySelector('.dropdown-menuDos');
    dropdownMenu.style.display = 'none';
  }
  