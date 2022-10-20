
var cardContainer = document.getElementById("card-rows");

var cards = cardContainer.getElementsByClassName("bowl-item-js");



for (var i = 0; i < cards.length; i++) {
    cards[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" active", "");
        }

        // Add the active class to the current/clicked button
        this.className += " active";
    });
}