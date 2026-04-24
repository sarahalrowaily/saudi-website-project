function toggleMode() {
    document.body.classList.toggle("dark-mode");
}
function filterRegions(type) {
    var cards = document.querySelectorAll(".card");

    cards.forEach(function(card) {
        if (type === "all") {
            card.style.display = "block";
        } else if (card.classList.contains(type)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
