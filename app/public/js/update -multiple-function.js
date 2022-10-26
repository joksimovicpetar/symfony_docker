async function updateMultiple(routeEdit,routeNext) {
    let active_cards = document.getElementsByClassName("active");

    let attribute = active_cards.getAttribute("data-id");

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