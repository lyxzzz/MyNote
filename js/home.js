$(document).ready(function () {
    $("li").click(function () {
        $(".active").removeClass("active");
        $(this).addClass("active");
        loadinfo();
    })
    loadinfo();
})
function loadinfo() {
    var target= $(".active").data("link");
    $.ajax({
        type: "GET",
        url:  "/web_project/index.php/pages/loadinfo",
        data:"target="+target,
        datatype: "html",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            $("#loader").html(data);
            $(".mylink").click(function () {
                var type=$(".active").data("link");
                window.location.href="/web_project/index.php/"+type+"/loadinfo/"+$(this).data("link");
            })
        }
    });
}