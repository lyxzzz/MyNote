$(document).ready(function () {
    $("#pd").keyup(function () {
        var e = event || window.event;
        if (e && e.keyCode == 13) { //回车键的键值为13
            $.ajax({
                type: "POST",
                url:  "/web_project/index.php/manager/check",
                data: "pd="+$("#pd").val(),
                datatype: "text",
                async: true,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    $("#main").html(data);
                }
            });
        }
    })
    var lastTime;
    $("#search-event").keyup(function (e) {
        lastTime = e.timeStamp;
        setTimeout(function () {
            if (lastTime - e.timeStamp == 0) {
                $.ajax({
                    type: "POST",
                    url:  "/web_project/index.php/manager/find",
                    data:"name="+$("#search-event").val().toString(),
                    datatype: "html",
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        $("#main").html(data);
                    }
                });
            }
        }, 1000);
    });
    $(".book-div").click(function () {
        var uid=$(this).data("myid");
        $("#submit-delete").click(function () {
            $.ajax({
                type: "POST",
                url:  "/web_project/index.php/manager/delete",
                data:"id="+uid,
                datatype: "html",
                async: false,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    $('#isdelete').modal('hide');
                    $("#main").html(data);
                }
            });
        })
    })
})