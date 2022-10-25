active("sauce-rows", "card-sauce")

const btn = document.getElementById("sauce-next");
btn.addEventListener('click', () => {
        update('http://localhost:8080/sauce/edit','http://localhost:8080/ingridient')
    }
    , false);