async function updateMultiple(routeEdit,routeNext) {
    let activeCards = document.getElementsByClassName("active");
    const dataIds = [];

    for (const activeCard of activeCards) {
        dataIds.push({id: parseInt(activeCard.getAttribute("data-id"))})
    }

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({dataObjects: dataIds}),
        });
        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while creating item order')
    }
};