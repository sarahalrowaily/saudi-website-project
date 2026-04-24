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
        var name = card.getAttribute("data-name").toLowerCase();
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

var places = {
    riyadh: {
        name: "الرياض",
        image: "images/riyadh.jpg",
        description: "الرياض هي عاصمة المملكة العربية السعودية وتجمع بين الحداثة والتاريخ.",
        landmarks: ["برج المملكة", "المتحف الوطني", "الدرعية"]
    },

    abha: {
        name: "أبها",
        image: "images/abha.jpg",
        description: "أبها مدينة جبلية جميلة في جنوب المملكة.",
        landmarks: ["السودة", "رجال ألمع", "منتزه عسير"]
    },

    ula: {
        name: "العلا",
        image: "images/alula.jpg",
        description: "العلا منطقة تاريخية تحتوي على آثار قديمة مثل مدائن صالح.",
        landmarks: ["مدائن صالح", "جبل الفيل", "البلدة القديمة"]
    },

    khobar: {
        name: "الخبر",
        image: "images/khobar.jpg",
        description: "الخبر مدينة ساحلية حديثة تقع على الخليج العربي.",
        landmarks: ["كورنيش الخبر", "شاطئ نصف القمر", "الواجهة البحرية"]
    },

    mecca: {
        name: "مكة المكرمة",
        image: "images/mecca.jpg",
        description: "مكة المكرمة أقدس مدينة في الإسلام.",
        landmarks: ["الكعبة المشرفة", "المسجد الحرام", "جبل عرفات"]
    },

    tabuk: {
        name: "تبوك",
        image: "images/tabuk.jpg",
        description: "تبوك مدينة في شمال المملكة تتميز بطبيعتها.",
        landmarks: ["قلعة تبوك", "وادي الديسة", "جبال اللوز"]
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
