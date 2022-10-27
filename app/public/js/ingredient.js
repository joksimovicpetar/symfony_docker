const btn = document.getElementById("ingredient-next");
btn.addEventListener('click', () => {
        updateCheckBox('http://localhost:8080/item_order_ingredient/edit','http://localhost:8080/extra_ingredient')
    }
    , false);