async function updateCheckBox(routeEdit,routeNext) {
    let checkedBoxes = document.getElementsByClassName("filled-in");
    const dataIds = [];

    for (const checkBox of checkedBoxes) {
        if (checkBox.checked) {
            dataIds.push({id: parseInt(checkBox.getAttribute("data-id"))})
        }
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
}

