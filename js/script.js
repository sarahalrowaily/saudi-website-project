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
var places = {
    riyadh: {
        name: "الرياض",
        image: "https://source.unsplash.com/600x400/?riyadh",
        description: "الرياض هي عاصمة المملكة العربية السعودية وتجمع بين الحداثة والتاريخ.",
        landmarks: ["برج المملكة", "المتحف الوطني", "الدرعية"]
    },

    jeddah: {
        name: "جدة",
        image: "https://source.unsplash.com/600x400/?jeddah",
        description: "جدة مدينة ساحلية تقع على البحر الأحمر وتتميز بتاريخها وأسواقها القديمة.",
        landmarks: ["كورنيش جدة", "البلد", "نافورة الملك فهد"]
    },

    abha: {
        name: "أبها",
        image: "https://source.unsplash.com/600x400/?abha",
        description: "أبها مدينة جبلية جميلة في جنوب المملكة وتشتهر بأجوائها الباردة وطبيعتها.",
        landmarks: ["السودة", "قرية رجال ألمع", "منتزه عسير الوطني"]
    }
};

function loadPlaceDetails() {
    var params = new URLSearchParams(window.location.search);
    var placeKey = params.get("place");

    if (!placeKey || !places[placeKey]) {
        placeKey = "riyadh";
    }

    var place = places[placeKey];

    document.getElementById("place-name").textContent = place.name;
    document.getElementById("place-image").src = place.image;
    document.getElementById("place-description").textContent = place.description;

    var list = document.getElementById("place-landmarks");
    list.innerHTML = "";

    place.landmarks.forEach(function(landmark) {
        var item = document.createElement("li");
        item.textContent = landmark;
        list.appendChild(item);
    });
}

if (document.getElementById("place-details")) {
    loadPlaceDetails();
}
