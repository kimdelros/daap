function overlayOn() {
  document.getElementById("regOverlay").style.display = "block";
}

function overlayOff() {
  document.getElementById("regOverlay").style.display = "none";
}

function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
