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
        image: "images/riyadh.jpg",
        description: "الرياض هي عاصمة المملكة العربية السعودية وتجمع بين الحداثة والتاريخ.",
        landmarks: ["برج المملكة", "المتحف الوطني", "الدرعية"]
    },

    abha: {
        name: "أبها",
        image: "images/abha.jpg",
        description: "أبها مدينة جبلية جميلة في جنوب المملكة وتشتهر بأجوائها الباردة وطبيعتها.",
        landmarks: ["السودة", "قرية رجال ألمع", "منتزه عسير الوطني"]
    },

    ula: {
        name: "العلا",
        image: "images/ula.jpg",
        description: "العلا منطقة تاريخية غنية بالآثار القديمة مثل مدائن صالح وجبل الفيل.",
        landmarks: ["مدائن صالح", "جبل الفيل", "البلدة القديمة"]
    },

    khobar: {
        name: "الخبر",
        image: "images/khobar.jpg",
        description: "الخبر مدينة ساحلية حديثة تقع على الخليج العربي وتتميز بالواجهة البحرية.",
        landmarks: ["كورنيش الخبر", "شاطئ نصف القمر", "الواجهة البحرية"]
    },

    mecca: {
        name: "مكة المكرمة",
        image: "images/mecca.jpg",
        description: "مكة المكرمة أقدس مدينة في الإسلام وتضم المسجد الحرام والكعبة المشرفة.",
        landmarks: ["الكعبة المشرفة", "المسجد الحرام", "جبل عرفات"]
    },

    tabuk: {
        name: "تبوك",
        image: "images/tabuk.jpg",
        description: "تبوك مدينة شمالية تتميز بطبيعتها وتاريخها ومعالمها المتنوعة.",
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
