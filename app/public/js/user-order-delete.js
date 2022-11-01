async function deleteOrderItem(routeEdit, dataId) {
    console.log(dataId);
    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({valueId: dataId}),
        });
    }
    catch (e) {
        console.error('Error while creating item order')
    }
}

const btns = document.getElementsByClassName("btn-delete-order-item");
for (const btn of btns) {
    btn.addEventListener('click', () => {
        alert('clicked')
            const dataId = btn.getAttribute("data-id");
            deleteOrderItem('http://localhost:8080/user_order/delete', dataId)
        }
        , false);
}
