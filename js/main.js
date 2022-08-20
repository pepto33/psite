// Напоминалка
$("#pBell").on("click", function () {
  bootbox.prompt({
    size: "small",
    title: "О чём вам напомнить?",
    locale: "ru",
    callback: function (resultText) {
      text = resultText;
      bootbox.prompt({
        size: "small",
        title: "Через сколько минут?",
        locale: "ru",
        callback: function (result) {
          showResult(result);
        },
      });
    },
  });
});
function showResult(result) {
  if (typeof result !== "undefined" && result !== null) {
    time = result * 60 * 1000;
    setTimeout(function () {
      bootbox.alert({
        size: "small",
        title: "Вот!",
        message: text,
        locale: "ru",
      });
    }, time);
  }
}
// END Напоминалка
// Погода
function getGeoInfo() {
  $.get(
    "https://ipinfo.io",
    function (response) {
      let url = `http://api.openweathermap.org/data/2.5/weather?q=${response.city}&lang=${response.country}&units=metric&appid=25aafc045eadd1ecf3ba7766db127469`;
      //let url = 'http://api.openweathermap.org/data/2.5/weather?q=' + response.city + '&lang=' + response.country + '&units=metric&appid=25aafc045eadd1ecf3ba7766db127469';
      axios.get(url).then((res) => {
        document.querySelector(".weather").style.color =
          rgbColors[rand(0, rgbColors.length)];
        document.querySelector(".city").innerHTML = res.data.name;
        document.querySelector(".ip").innerHTML = response.ip;
        document.querySelector(".temp").innerHTML =
          res.data.main.temp.toFixed(0);
        document.querySelector(".humidity").innerHTML = res.data.main.humidity;
        document.querySelector(".wind").innerHTML = res.data.wind.speed;
      });
    },
    "json"
  );
}

$(document).ready(function () {
  getGeoInfo();
  setInterval(function () {
    getGeoInfo();
  }, 1000 * 600);
});
// END Погода

let rgbColors = [];
while (rgbColors.length < 255) {
  rgbColors.push(`rgb(${rand(0, 255)}, ${rand(0, 255)}, ${rand(0, 255)})`);
}

function rand(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

clock.addEventListener("click", function (e) {
  window.location = "/pages/clock1/index.html";
});

// //START warning Data-day
// const clock = document.getElementById("clock");
// let today = new Date();
// let dd = String(today.getDate()).padStart(2, '0');
// let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// let yyyy = today.getFullYear();
// let arr = ['Января', 'Февраля', 'Марта', 'Апреля', 'Майя', 'Июня', 'Июля', 'Августа', 'Сентября', 'Ноября', 'Октября', 'Декабря'];
// let mmN = arr[mm - 1];
// let time = 0;
// let text = "Ку-ку...";
// let startDay = "2022-01-08";
// function ldday(lday) {
//     //let dday;
//     if (lday == 1) {
//         strldday = 'Прошел: \n';
//     } else {
//         strldday = 'Прошло: \n';
//     }
//     return strldday;
// }
// function dday(nday) {
//     let strdday;
//     if (nday == 0 || nday == 5 || nday == 6 || nday == 7 || nday == 8 || nday == 9) {
//         strdday = ' дней';
//     } else if (nday == 1) {
//         strdday = ' день';
//     } else {
//         strdday = ' дня';
//     }
//     return strdday;
// }
// today = yyyy + '-' + mm + '-' + dd;
// function getNumberOfDays(start, end) {
//     const date1 = new Date(start);
//     const date2 = new Date(end);
//     const oneDay = 1000 * 60 * 60 * 24;
//     const diffInTime = date2.getTime() - date1.getTime();
//     const diffInDays = Math.round(diffInTime / oneDay);
//     return diffInDays;
// }
// let dayfull = getNumberOfDays(startDay, today);

// function datediff(date) {
//     let d1 = date;
//     let d2 = now = new Date();
//     if (d2.getTime() < d1.getTime()) {
//         d1 = now;
//         d2 = date;
//     }
//     let yd = d1.getYear();
//     let yn = d2.getYear();
//     let years = yn - yd;
//     let md = d1.getMonth();
//     let mn = d2.getMonth();
//     let months = mn - md;
//     if (months < 0) {
//         years--;
//         months = 12 - md + mn;
//     }
//     let dd = d1.getDate();
//     let dn = d2.getDate();
//     let days = dn - dd;
//     if (days < 0) {
//         months--;
//         d2.setMonth(mn, 0);
//         days = d2.getDate() - dd + dn;
//     }
//     let weeks = Math.floor(days / 7);
//     days = days % 7;
//     if (years > 0) return ldday(dayfull % 10) + years + ' год' + (months > 0 ? ' ' + months + ' мес' : '') + (weeks > 0 ? ' ' + weeks + ' нед' : '') + (days > 0 ? ' ' + days + dday(days % 10) : '') + " (" + dayfull + dday(dayfull % 10) + ")";
//     if (months > 0) return ldday(dayfull % 10) + months + ' мес' + (weeks > 0 ? ' ' + weeks + ' нед' : '') + (days > 0 ? ' ' + days + dday(days % 10) : '') + " (" + dayfull + dday(dayfull % 10) + ")";
//     if (weeks > 0) return ldday(dayfull % 10) + weeks + ' нед' + (days > 0 ? ' ' + days + dday(days % 10) : '') + " " + " (" + dayfull + dday(dayfull % 10) + ")";
//     return ldday(dayfull % 10) + (days > 0 ? ' ' + days + dday(days % 10) : '') + " " + " (" + dayfull + dday(dayfull % 10) + ")";
// }
// function outDate() {
//     todayHead.innerText = datediff(new Date(startDay));
// }
// $(document).ready(function () {
//     setInterval(outDate(), 1000);
// });

/* <div class="head-row mt-1 elhide">
    <div class="row ">
        <div id="todayHead" class="text-center text-success col-md-12">До нового года...</div>
    </div>
</div> */
//END warning Data-day
