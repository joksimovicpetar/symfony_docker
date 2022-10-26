activeMultiple("extra-ingredient-rows", "card-extra-ingredient")

const btn = document.getElementById("extra-ingredient-next");
btn.addEventListener('click', () => {
        updateMultiple('http://localhost:8080/item_order_extra_ingredient/edit','http://localhost:8080/extra_ingredient')
    }
    , false);

