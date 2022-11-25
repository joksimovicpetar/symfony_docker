async function registerUser(routeEdit, routeNext) {

    const username = document.getElementById('inputUsername').value;
    const password = document.getElementById('inputPassword').value;
    const repeatPassword = document.getElementById('inputRepeatPassword').value;
    const name = document.getElementById('inputName').value;
    const address = document.getElementById('inputAddress').value;
    const phone = document.getElementById('inputPhoneNumber').value;

    if (password !== '' && username !== '' && name !== '' && address !== '' && phone !== '') {
        if (password === repeatPassword) {
            try {
                const response = await fetch(routeEdit, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({username: username, password: password, name: name, address: address, phone: phone})
                });

                if (response.status === 202) {
                    alert('Username already exists!')
                    return
                }
                window.location.href = routeNext
            } catch (e) {
                console.error('Error while updating item order')
                console.log(e)
            }
        } else {
            alert("Passwords don't match!")
        }
    } else {
        alert("You have to fill all required fields!")
    }
}

function register(){
    const btn = document.getElementById("register");
    btn.addEventListener('click', () => {
            registerUser('http://localhost:8080/register/write','http://localhost:8080/?registered=true')
        }
        , false);
}

register()