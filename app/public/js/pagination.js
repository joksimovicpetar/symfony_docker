const offset = 4;
const pagination = {};
const LOAD_ROUTE = 'http://localhost:8080/bowl';

async function loadMore({page, offset, categoryId}) {
    // console.log("active_card");
    try{
        const response = await fetch( LOAD_ROUTE, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({offset, page: ++page, category: categoryId}),
        });

        const decodedResponse = await response.json();
        document.getElementById(`category-container-${categoryId}`).innerHTML += decodedResponse.html;
        active("card-rows", "card-bowl")
        pagination[categoryId].page++;
        pagination[categoryId].hasMore = decodedResponse.hasMoreResults;
        if (pagination[categoryId].hasMore===false){
            document.getElementById(`bowl-load-more-${categoryId}`).style.visibility = 'hidden';
        }
    }
    catch (e) {
        console.error('Error while creating item order')
    }
}

function load(){
    const loadMoreButtons = document.getElementsByClassName("bowl-load");
    for (const loadMoreButton of loadMoreButtons) {
        loadMoreButton.addEventListener('click', () => {
                // alert('clicked')
                const category = loadMoreButton.getAttribute("data-id");
                loadMore(pagination[category])
            }
            , false);
    }
}

function populatePagination(){
    categories.forEach((category) => {
        pagination[category.id] = {
            page: 0,
            offset: offset,
            categoryId: category.id,
            hasMore: true
        };
        loadMore(pagination[category.id])
    })
}

load()
populatePagination()
// console.log(pagination)