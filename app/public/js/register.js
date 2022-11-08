async function registerUser(routeEdit, routeNext) {

    const username = document.getElementById('inputUsername').value;
    const password = document.getElementById('inputPassword').value;
    const repeatPassword = document.getElementById('phone').value;
    try{
        await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({fullName: fullName, address: address, phoneNumber: phoneNumber, time: time, payment: payment, date: date, note: note})
        });
        window.location.href = routeNext
    }
    catch (e) {
        console.error('Error while updating item order')
        console.log(e)
    }
}

function register(){
    const btn = document.getElementById("register");
    btn.addEventListener('click', () => {
            sendData('http://localhost:8080/register/write','http://localhost:8080/bowl')
        }
        , false);
}

register()