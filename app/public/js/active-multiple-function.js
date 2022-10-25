function activeMultiple(elementID,classNames) {
    const cardContainer = document.getElementById(elementID);

    const cards = cardContainer.getElementsByClassName(classNames);
    const CLASS_ACTIVE = 'active';


    console.log(cards);
    for (let card of cards) {

        card.addEventListener("click", function () {

            if (this.classList.contains('active')) {
                this.classList.remove(CLASS_ACTIVE);
            } else {
                this.classList.add(CLASS_ACTIVE);
            }
        });
    }
}