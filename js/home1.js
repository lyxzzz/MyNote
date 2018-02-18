$(document).ready(function () {
    $("li").click(function () {
        $(".active").removeClass("active");
        $(this).addClass("active");
        loadinfo();
    })
})
function loadinfo() {
    var target= $(".active").data("link");
    window.location.href="/web_project/index.php/pages/mainpage/"+target;
}