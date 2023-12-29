// document.addEventListener('DOMContentLoaded', function () {
//     // Obtenir le conteneur des étapes et le bouton d'ajout
//     var stepsContainer = document.getElementById('recipe_steps');
//     var addButton = document.createElement('button');
//     addButton.type = 'button';
//     addButton.className = 'btn btn-success';
//     addButton.textContent = 'Ajouter une étape';

//     // Ajouter le bouton d'ajout
//     stepsContainer.appendChild(addButton);

//     // Compter le nombre d'étapes actuelles
//     var index = stepsContainer.querySelectorAll(':input').length;

//     // Gérer l'ajout d'une nouvelle étape
//     addButton.addEventListener('click', function () {
//         // Récupérer le prototype
//         var prototype = stepsContainer.getAttribute('data-prototype');

//         // Remplacer "__name__" dans le prototype par l'index actuel
//         var newForm = prototype.replace(/__name__/g, index);

//         // Créer un conteneur temporaire pour le nouveau formulaire
//         var tempContainer = document.createElement('div');
//         tempContainer.innerHTML = newForm;

//         // Ajouter le formulaire de la nouvelle étape
//         stepsContainer.appendChild(tempContainer.firstChild);

//         // Incrémenter l'index
//         index++;
//     });
// });