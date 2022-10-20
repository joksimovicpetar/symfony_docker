const cardContainer = document.getElementById("extra-ingredient-rows");
const cards = cardContainer.getElementsByClassName("card-extra-ingridient");
const CLASS_ACTIVE = 'active';

console.log(cards);
for (let card of cards) {
    card.addEventListener("click", function () {
        const current = document.getElementsByClassName(CLASS_ACTIVE);
        if (current.length > 0) {
            current[0].classList.remove(CLASS_ACTIVE)
        }

        this.classList.add(CLASS_ACTIVE);
    });
}