const switchBtn = document.getElementById("twelveHourBtn");
const switchBtnSec = document.getElementById("secBtn");

let twelveHourBtn = document.getElementById("twelveHourBtn");
let secBtn = document.getElementById("secBtn");
let getTime = document.getElementById("time");
let isTwelveHour = false;
let amPm = " AM";

// ============ Get the time ======================

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function startTime() {
    let hours = "12";
    let today = new Date();
    let h = today.getHours();

    if (h > 12) {
        amPm = " PM";
    } else {
        amPm = " AM";
    }
    if (isTwelveHour) {
        hours = "24";
        if (h >= 12) {
            h = h - 12;
        }
    } else {
        hours = "12";
    }
    secBtn.innerHTML = "сек";
    //  if (isSec) {
    //        getTime.innerHTML = h + ":" + m;
    //} else {
    //      getTime.innerHTML = h + ":" + m + ":" + s;
    //    }
    twelveHourBtn.innerHTML = "12/24";
    let m = today.getMinutes();
    let s = today.getSeconds();
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    if (hours == 12) {
        getTime.innerHTML = h + ":" + m;
    } else if (hours == 24) { getTime.innerHTML = h + ":" + m + amPm; }
    t = setTimeout(function () {
        startTime();
    }, 500);
}

startTime();

switchBtn.addEventListener("click", function (e) {
    isTwelveHour = !isTwelveHour;
});
switchBtnSec.addEventListener("click", function (e) {
    isSec = !isSec;
});
// ============= Get the day of the week =============================
switch (new Date().getDay()) {
    case 0:
        document.querySelector(".sunday").classList.add("glow");
        break;
    case 1:
        document.querySelector(".monday").classList.add("glow");
        break;
    case 2:
        document.querySelector(".tuesday").classList.add("glow");
        break;
    case 3:
        document.querySelector(".wednesday").classList.add("glow");
        break;
    case 4:
        document.querySelector(".thursday").classList.add("glow");
        break;
    case 5:
        document.querySelector(".friday").classList.add("glow");
        break;
    case 6:
        document.querySelector(".saturday").classList.add("glow");
}

// ============= Get the date =============================
let month = document.querySelector(".month");
let day = document.querySelector(".day");
let year = document.querySelector(".year");
let date = new Date();

let months = [
    "Январь",
    "Февраль",
    "Март",
    "Апрель",
    "Май",
    "Июнь",
    "Июль",
    "Август",
    "Сентябрь",
    "Октябрь",
    "Ноябрь",
    "Декабрь"
];
month.innerHTML = months[date.getMonth()];
day.innerHTML = date.getDate();
year.innerHTML = date.getFullYear();
