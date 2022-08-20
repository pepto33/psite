function timerm() {
  arr1 = ["20230303", "20230711", "20230910"];
  arr2 = ["Н", "Е", "Д"];

  for (let i = 0; i < arr1.length; i++) {
    $.ajax({
      url: "/php/timerm.php" + "?" + "datem=" + arr1[i] + "&name=" + arr2[i],
      cache: false,
      success: function (html) {
        $("#" + arr1[i]).html(html);
      },
    });
  }
}

$(document).ready(function () {
  timerm();
  setInterval("timerm()", 1000);
});
