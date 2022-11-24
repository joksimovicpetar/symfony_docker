async function update(routeEdit,routeNext) {
    let active_card = document.getElementsByClassName("active")[0];
    let attribute = active_card.getAttribute("data-id");
    console.log("active_card");

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({id: parseInt(attribute)}),
        });
        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while creating item order')
    }
}