
$( "li" ).hover(
  // function() {
  //     $(this).find("a").css("color","#555");
  //     $(this).find("span").stop().animate({
  //     width:"100%",
  //     opacity:"1",
  //   }, 600, function () {
  //       // Animation complete.
  //       // Show Navigation
  //   })
  // }, function() {
  //     $(this).find("a").css("color","#555");
  //     $(this).find("span").stop().animate({
  //     width:"0%",
  //     opacity:"0",
  //   }, 600, function () {
  //       // Animation complete.
  //       // Show Navigation
  //   })
  // }
);
$(document).ready(function(){
    $("#avatar").mouseover(function () {
        $("#avatar").addClass("littlehand");
        $("#avatartip").text("个人账号");
    })
    $("#avatar").mouseout(function(){
        $("#avatartip").text("");
    });
    // $.ajax({
    //     type: "POST",
    //     url:  "/web_project/index.php/book/books",
    //     data:"",
    //     datatype: "html",
    //     async: false,
    //     error: function(request) {
    //         alert("Connection error");
    //     },
    //     success: function(data) {
    //         $("#block").html(data);
    //     }
    // });
    $(".myul li").click(function(){
        $(".myul li[class='beselected']").removeClass("beselected");
        $(this).addClass("beselected");
        //alert($var);
    })

});
function  loadurl($url) {
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/"+$url,
        data:"",
        datatype: "html",
        async: true,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            $("#block").empty();
            $("#block").html(data);
        }
    });
}