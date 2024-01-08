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

const icon = document.querySelector(".bento-container");
const list = document.querySelector(".navbar-desktop");

icon.addEventListener("click", function () {
	list.classList.toggle("list-visible");
	icon.classList.toggle("icon-visible");
});

// Fonction pour changer la couleur de l'icône en fonction de la page active
// Fonction pour changer la couleur de l'icône en fonction de la page active
function changeIconColor() {
    // Récupérer le chemin de la page actuelle
    var currentPath = window.location.pathname;

    // Sélectionner toutes les balises <a> dans le menu
    var menuLinks = document.querySelectorAll('.vh-100 a');

    // Parcourir les liens du menu
    menuLinks.forEach(function(link) {
        // Récupérer le chemin du lien
        var linkPath = link.getAttribute('href');

        // Récupérer l'icône à l'intérieur du lien
        var icon = link.querySelector('i');

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