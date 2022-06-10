function searchMouseOut() {
    element = document.getElementById("search");
    value = element.value;
    if (value === null || value.match(/^ *$/) !== null) {
        element.className = "search-input-default";
    }
    else{
        element.className = "search-input-default search-input-hover";
    }
}

function searchMouseOver() {
    element = document.getElementById("search");
    element.className = "search-input-default search-input-hover";
}

function accountMenuOpen(){
    document.getElementById("navAccountMenu").
}

theElement.addEventListener("touchend", accountMenuOpen, false);