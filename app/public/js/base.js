active("base-rows", "card-base")

const btn = document.getElementById("base-next");
btn.addEventListener('click', () => {
        update('http://localhost:8080/base/edit','http://localhost:8080/sauce')
    }
    , false);