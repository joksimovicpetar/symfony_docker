async function registerUser(routeEdit, routeNext) {

    const username = document.getElementById('inputUsername').value;
    // alert(username);
    const password = document.getElementById('inputPassword').value;
    // alert(password);
    const repeatPassword = document.getElementById('inputRepeatPassword').value;
    // alert(repeatPassword);
    if (password !== '' && username !== '') {
        if (password === repeatPassword) {
            try {
                const response = await fetch(routeEdit, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({username: username, password: password, repeatPassword: repeatPassword})
                });

                if (response.status === 202) {
                    alert('Username already exists!')
                    return
                }

                // console.log(response.status)
                // alert(JSON.stringify(response.status))
                window.location.href = routeNext
            } catch (e) {
                console.error('Error while updating item order')
                console.log(e)
            }
        } else {
            alert("Passwords don't match!")

        }
    } else {
        alert("Username and password are required fields!")

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