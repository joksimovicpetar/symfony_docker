function onlyOneCheckBox() {
    let elements = document.getElementById('elements').getElementsByTagName("input");
    let limit = 1;
    for (let i = 0; i < elements.length; i++) {
        elements[i].onclick = function() {
            let checkedCount = 0;
            for (let i = 0; i < elements.length; i++) {
                checkedCount += (elements[i].checked) ? 1 : 0;
            }
            if (checkedCount > limit) {
                console.log("You can select maximum of " + limit + " checkbox.");
                alert("You can select maximum of " + limit + " checkbox.");
                this.checked = false;
            }
        }
    }
}