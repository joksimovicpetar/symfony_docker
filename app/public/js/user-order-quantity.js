async function updateOrderItem(routeEdit, dataId) {

    try{
        const deleteResponse = await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({valueId: dataId}),
        });
        // console.log(deleteResponse)
        // console.log(deleteResponse.body)
        const response = await deleteResponse.json();
        // console.log(JSON.stringify(response))
        document.getElementById("user_order_table").innerHTML = response.html;
        updateItem()

    }
    catch (e) {
        console.error('Error while deleting item order')
        console.log(e)
    }
}
async function updateItem(){
    const btns = document.getElementsByName("quantity");
    for (const btn of btns) {
        btn.addEventListener('change', (event) => {
                console.log(event)
                const dataId = btn.getAttribute("data-id");
                updateOrderItem('http://localhost:8080/user_order/update', dataId)
            }
            , false);
    }
}

updateItem()
