function setBanner(content, bannerType = "error") {
  var bannerElement = document.getElementById("notifier");
  if (bannerElement) {
    var cssClass = "app-banner ";
    switch (bannerType) {
      case "error":
        cssClass += "app-error";
        break;
      case "success":
        cssClass += "app-success";
        break;
      case "info":
        cssClass += "app-info";
        break;
      default:
        cssClass += "app-error";
    }
    if (content.length && bannerElement) {
      bannerElement.innerHTML =
        "<div class='" + cssClass + "'>" + content + "</div>";
    }

    setTimeout(function() {
      bannerElement.innerHTML = "";
      window.history.replaceState(null, null, window.location.pathname);
    }, 3000);
  }
}
