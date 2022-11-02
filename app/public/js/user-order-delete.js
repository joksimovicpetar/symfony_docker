async function deleteOrderItem(routeEdit, dataId) {
    console.log(dataId);
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
        deleteItem()

    }
    catch (e) {
        console.error('Error while deleting item order')
        console.log(e)
    }
}
async function deleteItem(){
    const btns = document.getElementsByClassName("btn-delete-order-item");
    for (const btn of btns) {
        btn.addEventListener('click', () => {
                alert('clicked')
                const dataId = btn.getAttribute("data-id");
                deleteOrderItem('http://localhost:8080/user_order/delete', dataId)
            }
            , false);
    }
}

deleteItem()
