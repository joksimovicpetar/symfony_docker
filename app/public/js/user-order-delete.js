async function deleteOrderItem(routeEdit, dataId) {
    // console.log(dataId);

    try{
        const deleteResponse = await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({id: parseInt(dataId)}),
        });

        const response = await deleteResponse.json();
        document.getElementById("user_order_table").innerHTML = response.html;
        deleteItem()
        updateItem()

    }
    catch (e) {
        console.error('Error while deleting item order')
        console.log(e)
    }
}
function deleteItem(){
    const btns = document.getElementsByClassName("btn-delete-order-item");
    for (const btn of btns) {
        btn.addEventListener('click', () => {
                // alert('clicked')
                const dataId = btn.getAttribute("data-id");
                deleteOrderItem('http://localhost:8080/user_order/delete', dataId)
            }
            , false);
    }
}

deleteItem()
