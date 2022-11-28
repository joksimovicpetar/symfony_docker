const offset = 4;
let page = 1;

async function loadMore(routeEdit) {

    try{
        const response = await fetch(routeEdit, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({offset, page}),
        });

        const decodedResponse = await response.json();
        document.getElementById("card-rows").innerHTML += decodedResponse.html;
    }
    catch (e) {
        console.error('Error while creating item order')
    }
}

const btn = document.getElementById("bowl-load");
btn.addEventListener('click', () => {
        loadMore('http://localhost:8080/bowl')
    }
    , false);