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
        image: "images/alula.jpg",
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
/* ===== HERO SECTION ===== */

.hero {
    display: flex;
    justify-content: space-between;
    gap: 25px;
    padding: 30px;
}

.hero-text {
    flex: 1;
    background: #f4f4f4;
    padding: 25px;
    border-radius: 15px;
}

.hero-text h2 {
    margin-bottom: 10px;
}

.hero-text p {
    color: #555;
    line-height: 1.6;
}

.explore-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 18px;
    background: #1e5631;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
}

/* ===== RIGHT GREEN BOX ===== */

.hero-box {
    flex: 1;
    background: linear-gradient(135deg, #1e5631, #2e7d32);
    color: white;
    padding: 30px;
    border-radius: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.hero-box h2 {
    font-size: 28px;
    margin-bottom: 10px;
}

/* ===== CARDS ===== */

.info-cards {
    display: flex;
    gap: 20px;
    padding: 20px 30px;
}

.info-card {
    flex: 1;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.info-card h3 {
    margin-bottom: 10px;
}

/* ===== FOOTER ===== */

footer {
    text-align: center;
    padding: 15px;
    margin-top: 20px;
    color: #666;
}
