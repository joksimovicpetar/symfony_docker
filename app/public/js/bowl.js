active("card-rows", "card-bowl")

const updateBowl = async function() {
    let active_card = document.getElementsByClassName("active")[0];

    let attribute = active_card.getAttribute("data-id");

    try{
        await fetch('http://localhost:8080/item_order/new', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({bowlId: attribute}),
        });

        window.location.href = 'http://localhost:8080/size'
    }
    catch (e) {
        console.error('Error while creating item order')
    }

};

const btn = document.getElementById("bowl-next");
btn.addEventListener('click', updateBowl, false);