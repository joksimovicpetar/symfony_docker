async function getInfo(routeEdit, routeNext) {

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({valueId: dataId, quantity: quantity})


        });
        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while updating item order')
        console.log(e)
    }
}
function saveInfo(){
    const btn = document.getElementById("place-order");
    btn.addEventListener('click', () => {
            getInfo('http://localhost:8080/checkout/save','http://localhost:8080/sauce')
        }
        , false);
}

saveInfo()