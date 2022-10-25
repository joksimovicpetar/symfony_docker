active("size-rows", "card-size")

const btn = document.getElementById("size-next");
btn.addEventListener('click', () => {
        update('http://localhost:8080/size/edit','http://localhost:8080/base')
    }
    , false);