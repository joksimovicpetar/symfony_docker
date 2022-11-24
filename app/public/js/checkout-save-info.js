async function sendData(routeEdit, routeNext) {

    const fullName = document.getElementById('full-name').value;
    const address = document.getElementById('address').value;
    const phoneNumber = document.getElementById('phone').value;
    const deliveryTime = document.getElementById('time').value;
    const payment = document.getElementById('payment').value;
    const orderDate = document.getElementById('date').value;
    const note = document.getElementById('note').value;

    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({fullName: fullName, address: address, phoneNumber: phoneNumber, deliveryTime: deliveryTime, payment: payment, orderDate: orderDate, note: note})
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
            sendData('http://localhost:8080/checkout/save','http://localhost:8080/bowl')
        }
        , false);
}

saveInfo()