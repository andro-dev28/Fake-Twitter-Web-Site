function search() {
    let searchKey = $("#searchInput").val().trim();

    if (searchKey.length > 0) {
        window.location = "search.php?q="+searchKey
    }
}

$(".alert-dismissible").delay(4000).slideUp(300);