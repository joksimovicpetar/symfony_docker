async function updateOrderItem(routeEdit, dataId, quantity) {

    try{
        const updateResponse = await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({id: parseInt(dataId), quantity: parseInt(quantity)})

        });
        const response = await updateResponse.json();
        document.getElementById("user_order_table").innerHTML = response.html;
        updateItem()
        deleteItem()

    }
    catch (e) {
        console.error('Error while updating item order')
        console.log(e)
    }
}
function updateItem(){
    const btns = document.getElementsByName("quantity");
    for (const btn of btns) {
        btn.addEventListener('change', (event) => {
                // console.log(event)
                // console.log(event.target.value)
                const quantity = event.target.value;
                const dataId = btn.getAttribute("data-id");
                updateOrderItem('http://localhost:8080/user_order/update', dataId, quantity)
            }
            , false);
    }
}

updateItem()
