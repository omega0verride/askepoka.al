function showDotsDropdown($postId) {
    document.getElementById("card_menu_dropdown_" + $postId).classList.toggle("show");
    var dropdowns = document.getElementsByClassName("dots_dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show') && openDropdown.id != "card_menu_dropdown_" + $postId) {
            openDropdown.classList.remove('show');
        }
    }
}
// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dots_dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}


function confirmDelete(postId, redirect=null) {
    if (confirm('Sure To Remove This Record?')) {
        url ="/askepoka.al/src/validate/validate_post_delete.php?id="+postId;
        if (redirect){
            url+="&redirect="+redirect;
        }
        window.location.href=url;
    }

}