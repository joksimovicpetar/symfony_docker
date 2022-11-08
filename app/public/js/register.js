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
                response = await fetch(routeEdit, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({username: username, password: password, repeatPassword: repeatPassword})
                });

                alert(JSON.stringify(response))
                // window.location.href = routeNext
            } catch (e) {
                console.error('Error while updating item order')
                alert('ohyeah')
                console.log(e)
            }
        } else {
            alert("Pass doesnt match")

        }
    } else {
        alert("Username and password are required fields!")

    }
}

function register(){
    const btn = document.getElementById("register");
    btn.addEventListener('click', () => {
            registerUser('http://localhost:8080/register/write','http://localhost:8080/login')
        }
        , false);
}

register()