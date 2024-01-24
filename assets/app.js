/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

const icon = document.querySelector(".bento-container");
const list = document.querySelector(".navbar-desktop");

icon.addEventListener("click", function () {
	list.classList.toggle("list-visible");
	icon.classList.toggle("icon-visible");
});


document.addEventListener("click", function (event){
	// listen if click inside the navbar
	const isClickInsideNavabr = list.contains(event.target); 
	// listen if click on the bento
	const isClickOnIcon = icon.contains(event.target);

	if (!isClickInsideNavabr && !isClickOnIcon) {
		list.classList.remove("list-visible");
	}
});

// Fonction pour changer la couleur de l'icône en fonction de la page active
function changeIconColor() {
    // Récupérer le chemin de la page actuelle
    let currentPath = window.location.pathname;

    // Sélectionner toutes les balises <a> dans le menu
    const menuLinks = document.querySelectorAll('.h-100 a');

    // Parcourir les liens du menu
    menuLinks.forEach(function(link) {
        // Récupérer le chemin du lien
        const linkPath = link.getAttribute('href');

        // Récupérer l'icône à l'intérieur du lien
        const icon = link.querySelector('i');

        // Vérifier si le chemin du lien correspond à la page actuelle
        if (currentPath === linkPath) {
            // Changer la couleur de l'icône (par exemple, rouge)
            icon.style.color = '#bf4e40';
        } else {
            // Rétablir la couleur par défaut (par exemple, noir)
            icon.style.color = '#444559';
        }
    });
}

// Appeler la fonction au chargement de la page
document.addEventListener('DOMContentLoaded', changeIconColor);

setTimeout(function() {
    const flashMessage = document.querySelector('div.alert');
    if (flashMessage) {
        flashMessage.remove();
    }
}, 3000);


// Function to check if an element is in the viewport
function isElementInViewport(image) {
    const rect = image.getBoundingClientRect();
    return (
     rect.top >= 0 &&
     rect.left >= 0 &&
     rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
     rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
   }
   // Function to lazily load content
   function lazyLoadContent() {
    const lazyContentElements = document.querySelectorAll(".lazy-content");
    lazyContentElements.forEach((image) => {
     if (isElementInViewport(image)) {
      // Add your logic to load the content for the element here
      image.classList.add("loaded");
     }
    });
   }
   // Attach the lazyLoadContent function to the scroll event
   window.addEventListener("scroll", lazyLoadContent);
   // Call the function initially to load the visible content on page load
   lazyLoadContent();




