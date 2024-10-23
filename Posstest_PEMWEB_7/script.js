function toggleMode() {
    document.body.classList.toggle("dark-mode");
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

function liveSearch() {
    var searchQuery = document.getElementById("search").value;
    if (searchQuery.length == 0) {
        document.getElementById("results").innerHTML = "";
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "search.php?search=" + searchQuery, true);
    xhr.send();
}
