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

// document.querySelector('.add_step').addEventListener('click', function() {
//     let prototype = document.querySelector('.steps').dataset.prototype;
//     let index = document.querySelectorAll('.steps li').length;
//     var newForm = prototype.replace(/__name__/g, index);
//     document.querySelector('.steps').insertAdjacentHTML('beforeend', newForm);
// });