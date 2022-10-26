async function updateMultiple(routeEdit,routeNext) {
    let activeCards = document.getElementsByClassName("active");

    const dataIds = [];

    for (const activeCard of activeCards) {
        dataIds.push(activeCard.getAttribute("data-id"))
    }
    // alert(dataIds)

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({valueId: dataIds}),
        });

        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while creating item order')
    }

};