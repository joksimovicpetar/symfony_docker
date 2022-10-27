function active(elementID,classNames) {
    const cardContainer = document.getElementById(elementID);

    const cards = cardContainer.getElementsByClassName(classNames);
    const CLASS_ACTIVE = 'active';

    for (let card of cards) {

        card.addEventListener("click", function () {
            const current = document.getElementsByClassName(CLASS_ACTIVE);
            if (current.length > 0) {
                current[0].classList.remove(CLASS_ACTIVE)
            }

            this.classList.add(CLASS_ACTIVE);
        });
    }
}
