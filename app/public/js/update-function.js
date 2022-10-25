async function update(routeEdit,routeNext) {
    let active_card = document.getElementsByClassName("active")[0];

    let attribute = active_card.getAttribute("data-id");

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({valueId: attribute}),
        });

        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while creating item order')
    }

};