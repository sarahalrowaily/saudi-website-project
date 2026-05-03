function toggleMode() {
    document.body.classList.toggle("dark-mode");
}

function filterGallery() {
    var searchInput = document.getElementById("searchInput");
    var categorySelect = document.getElementById("categorySelect");
    var cards = document.querySelectorAll(".card");
    var count = 0;

    var searchText = searchInput ? searchInput.value.toLowerCase() : "";
    var category = categorySelect ? categorySelect.value : "all";

    cards.forEach(function(card) {
        var name = card.getAttribute("data-name") ? card.getAttribute("data-name").toLowerCase() : "";
        var matchSearch = name.includes(searchText);
        
        var matchCategory = category === "all" || card.classList.contains(category);

        if (matchSearch && matchCategory) {
            card.style.display = "block";
            count++;
        } else {
            card.style.display = "none";
        }
    });

    var resultCount = document.getElementById("resultCount");
    if (resultCount) {
        resultCount.textContent = count;
    }
}
