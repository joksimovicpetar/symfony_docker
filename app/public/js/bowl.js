active("card-rows", "card-bowl")

const btn = document.getElementById("bowl-next");
btn.addEventListener('click', () => {
        update('http://localhost:8080/bowl/new','http://localhost:8080/size')
    }
    , false);
