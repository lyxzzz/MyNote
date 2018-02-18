$(document).ready(function () {
    $("#view").click(function () {
        var bookid=$(".selected-book",parent.document).data("bookid");
        var noteid=$(".selected-note",parent.document).data("myid");
        $.ajax({
            type: "GET",
            url:  "/web_project/index.php/note/canwrite",
            data:"bookid="+bookid+"&noteid="+noteid,
            datatype: "text",
            async: true,
            error: function(request) {
                alert("Connection error");
            },
            success: function(data) {
                $("#view").addClass("hidden");
                $("#revise").removeClass("hidden");
                if(data=="success")
                {
                    $("#view").addClass("hidden");
                    $("#revise").removeClass("hidden");
                }
            }
        });
    })
    $("#pdf").click(function () {
        window.open(url,"_blank");
    })
    $("#save").click(function () {
        $("#revise").addClass("hidden");
        $("#view").removeClass("hidden");
        $("#looker").html($("#editor").html());
    })
    $(document).keyup(function () {
        var e = event || window.event;
        if (e && e.keyCode == 8 || e && e.keyCode == 127) { //回车键的键值为13
            if($(".selected-span").length>0)
            {
                var noteid=$(".selected-note",parent.document).data("myid");
                $.ajax({
                    type: "GET",
                    url:  "/web_project/index.php/label/deletelabel",
                    data:"labelname="+$(".selected-span").text().toString()+"&noteid="+noteid,
                    datatype: "text",
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        reloadlabel();
                    }
                });
            }
        }
    })
    $("#addlabel").keyup(function () {
        var e = event || window.event;
        if (e && e.keyCode == 13) { //回车键的键值为13
            var noteid=$(".selected-note",parent.document).data("myid");
            $.ajax({
                type: "GET",
                url:  "/web_project/index.php/label/addlabel",
                data:"labelname="+$(this).val().toString()+"&noteid="+noteid,
                datatype: "text",
                async: true,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    if(data=='success')
                    {
                        $("#addlabel").val("");
                        reloadlabel();
                        var book=$(".selected-book",parent.document).find('.lookbook');
                        book.trigger('click');
                    }
                    else
                    {
                        var i=$("#labelrepeat");
                        i.html(i.data(data));
                        setTimeout(function () {
                            i.html("");
                        }, 3000);
                    }
                }
            });
        }
    })
})
function reloadlabel() {
    var noteid=$(".selected-note",parent.document).data("myid");
    $.ajax({
        type: "GET",
        url:  "/web_project/index.php/label/getlabel",
        data:"noteid="+noteid,
        datatype: "text",
        async: true,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            var editor=$("#label-div");
            editor.html(data);
            $(".notespan").click(function () {
                if($(this).text()!=$(".selected-span").text())
                {
                    $(".selected-span").removeClass("selected-span");
                    $(this).addClass("selected-span");
                }
                else
                {
                    $(this).removeClass("selected-span");
                }
            })
        }
    });
}
