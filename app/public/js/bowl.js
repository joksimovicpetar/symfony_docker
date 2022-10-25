active("card-rows", "card-bowl")

const btn = document.getElementById("bowl-next");
btn.addEventListener('click', () => {
        update('http://localhost:8080/item_order/new','http://localhost:8080/size')
    }
    , false);
