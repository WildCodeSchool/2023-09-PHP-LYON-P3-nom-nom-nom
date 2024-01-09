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

document.addEventListener("click", function (event){
	// listen if click inside the navbar
	const isClickInsideNavabr = list.contains(event.target); 
	// listen if click on the bento
	const isClickOnIcon = icon.contains(event.target);

	if (!isClickInsideNavabr && !isClickOnIcon) {
		list.classList.remove("list-visible");
	}
})