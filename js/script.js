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
    
    info: [
        "المنطقة: الوسطى",
        "المناخ: صحراوي حار",
        "تشتهر بـ: الأبراج والأسواق الحديثة"
    ],

    landmarks: ["برج المملكة", "المتحف الوطني", "الدرعية"],

    gallery: [
        "images/riyadh.jpg",
        "images/riyadh2.jpg",
        "images/riyadh3.jpg"
    ]
},

mecca: {
    name: "مكة المكرمة",
    image: "images/mecca.jpg",
    description: "أقدس مدينة في الإسلام وتضم المسجد الحرام والكعبة المشرفة.",

    info: [
        "المنطقة: الغربية",
        "المناخ: حار",
        "تشتهر بـ: الحج والعمرة"
    ],

    landmarks: ["الكعبة المشرفة", "المسجد الحرام", "جبل عرفات"],

    gallery: [
        "images/mecca.jpg",
        "images/mecca2.jpg",
        "images/mecca3.jpg"
    ]
},

khobar: {
    name: "الخبر",
    image: "images/khobar.jpg",
    description: "مدينة ساحلية حديثة تقع على الخليج العربي.",

    info: [
        "المنطقة: الشرقية",
        "المناخ: معتدل نسبيًا",
        "تشتهر بـ: الواجهة البحرية"
    ],

    landmarks: ["كورنيش الخبر", "شاطئ نصف القمر", "الواجهة البحرية"],

    gallery: [
        "images/khobar.jpg",
        "images/khobar2.jpg",
        "images/khobar3.jpg"
    ]
},

abha: {
    name: "أبها",
    image: "images/abha.jpg",
    description: "مدينة جبلية جميلة في جنوب المملكة.",

    info: [
        "المنطقة: عسير",
        "المناخ: معتدل وبارد",
        "تشتهر بـ: الطبيعة والجبال"
    ],

    landmarks: ["السودة", "رجال ألمع", "منتزه عسير"],

    gallery: [
        "images/abha.jpg",
        "images/abha2.jpg",
        "images/abha3.jpg"
    ]
},

ula: {
    name: "العلا",
    image: "images/alula.jpg",
    description: "منطقة تاريخية غنية بالآثار القديمة.",

    info: [
        "المنطقة: المدينة المنورة",
        "المناخ: صحراوي",
        "تشتهر بـ: مدائن صالح"
    ],

    landmarks: ["مدائن صالح", "جبل الفيل", "البلدة القديمة"],

    gallery: [
        "images/alula.jpg",
        "images/alula2.jpg",
        "images/alula3.jpg"
    ]
},

tabuk: {
    name: "تبوك",
    image: "images/tabuk.jpg",
    description: "مدينة شمالية تتميز بطبيعتها.",

    info: [
        "المنطقة: الشمالية",
        "المناخ: معتدل",
        "تشتهر بـ: الجبال والوديان"
    ],

    landmarks: ["وادي الديسة", "قلعة تبوك", "جبال اللوز"],

    gallery: [
        "images/tabuk.jpg",
        "images/tabuk2.jpg",
        "images/tabuk3.jpg"
    ]
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
// معلومات سريعة
var infoList = document.getElementById("place-info");
infoList.innerHTML = "";
place.info.forEach(function(i) {
    var li = document.createElement("li");
    li.textContent = i;
    infoList.appendChild(li);
});

// معرض الصور
var gallery = document.getElementById("place-gallery");
gallery.innerHTML = "";
place.gallery.forEach(function(img) {
    var image = document.createElement("img");
    image.src = img;
    gallery.appendChild(image);
});
