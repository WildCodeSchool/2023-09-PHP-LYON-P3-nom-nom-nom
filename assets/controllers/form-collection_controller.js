import { Controller } from "@hotwired/stimulus";
export default class extends Controller {
  static targets = ["collectionContainer"];
  static values = {
    index: Number,
    prototype: String,
  };
  addCollectionElement(event) {
    const item = document.createElement("li");
    item.innerHTML = this.prototypeValue.replace(/__name__/g, this.indexValue);
    this.collectionContainerTarget.appendChild(item);
    this.indexValue++;
    const removeFormButton = document.createElement("button");
    removeFormButton.classList.add("delete-ingredient");
    removeFormButton.innerText = "Supprimer cette étape";
    item.append(removeFormButton);
    removeFormButton.addEventListener("click", (e) => {
      e.preventDefault();
      // remove the li for the tag form
      item.remove();
    });
  }
  addCollectionElementIngredient(event) {
    const item = document.createElement("li");
    item.classList.add("ingredient-form");
    item.innerHTML = this.prototypeValue.replace(/__name__/g, this.indexValue);
    this.collectionContainerTarget.appendChild(item);
    this.indexValue++;
    const removeFormButton = document.createElement("button");
    removeFormButton.classList.add("delete-ingredient");
    removeFormButton.innerText = "Supprimer cet ingrédient";
    item.append(removeFormButton);
    removeFormButton.addEventListener("click", (e) => {
      e.preventDefault();
      // remove the li for the tag form
      item.remove();
    });
  }

  // Permet de supprimer un ingrédient en prennant en compte la <li> la plus proche dans twig
  removeIngredient(event) {
    event.preventDefault();
    let ingredientElement = event.target.closest('li');
    ingredientElement.remove();
  }
  //  Permet de supprimer une étape en prennant en compte la <li> la plus proche dans twig
  removeStep(event) {
    event.preventDefault();
    let stepElement = event.target.closest('li');
    stepElement.remove();
  }
}