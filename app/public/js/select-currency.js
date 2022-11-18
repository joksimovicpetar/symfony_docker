async function selectedCurrency(routeEdit, currency) {

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({currency: currency})
        });

        window.location.reload();

    }
    catch (e) {
        console.error('Error while updating item order')
        console.log(e)
    }
}
function updateItem(){
    const btn = document.getElementById('currency-picker');
console.log(btn)
        btn.addEventListener('change', (event) => {
            // console.log(event.target.value)
            const currency = event.target.value;
            selectedCurrency('http://localhost:8080/currency', currency)
        }
        , false);

}

    updateItem();

