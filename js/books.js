function loadbooks() {
    $.ajax({
        type: "GET",
        url:  "/web_project/index.php/book/getbooks",
        data:"",
        datatype: "html",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            bookbook(data);
        }
    });
}
function notenote(notedata)
{
    var flag=false;
    var bid=0;
    if($(".selected-note").length>0)
    {
        bid=$(".selected-note").data("myid");
        flag=true;
    }
    $("#notes-div").html(notedata);
    $(".deletenote").click(function () {
        var i=this;
        $("#submit-delete").click(function () {
            $.ajax({
                type: "POST",
                url:  "/web_project/index.php/note/delete",
                data:"noteid="+$(i).data("noteid").toString(),
                datatype: "text",
                async: false,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    loadbooks();
                    $('#isdelete').modal('hide');
                }
            });
        })
    });
    $(".looknote").click(function () {
        var id=$(this).data("noteid");
        var name='#note-'+$(this).data("noteid");
        if($(".selected-note").data("myid")!=id)
        {
            $(".selected-note").removeClass("selected-note");
            $(name).addClass("selected-note");
            readnote();
        }
    });
    if(flag)
    {
        var flag=true;
        $('.note-div').each(function (i){
            if($(this).data("myid")==bid)
            {
                $(this).addClass("selected-note");
                flag=false;
            }
        });
        if(flag)
        {
            $(".note-div").first().addClass("selected-note");
        }
    }
    else
    {
        $(".note-div").first().addClass("selected-note");
    }
    readnote();
}
function bookbook(bookdata)
{
    var flag=false;
    var bid=0;
    if($(".selected-book").length>0)
    {
        bid=$(".selected-book").data("myid");
        flag=true;
    }
    $("#books-block").html(bookdata);

    $(".deletebook").click(function () {
        var i=this;
        $("#submit-delete").click(function () {
            $.ajax({
                type: "POST",
                url:  "/web_project/index.php/book/delete",
                data:"bookname="+$(i).data("bookname").toString(),
                datatype: "text",
                async: false,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    loadbooks();
                }
            });
            $('#isdelete').modal('hide');
        })
    });
    $(".lookbook").click(function () {

        var id=$(this).data("bookname");
        var name='#book-'+$(this).data("bookname");
        if($(".selected-book").data("myid")!=id)
        {
            $(".selected-book").removeClass("selected-book");
            $(name).addClass("selected-book");
        }
        loadnotes();
    });
    $(".opbook").click(function () {
        $bid=$(this).data("bookid");
        $.ajax({
            type: "GET",
            url:  "/web_project/index.php/authority/canread",
            data:"bookid="+$(this).data("bookid").toString()+"&isbook="+true,
            datatype: "text",
            async: false,
            error: function(request) {
                alert("Connection error");
            },
            success: function(data) {
                if(data==1)
                {
                    $(".selector").val("自己可见");
                }
                else
                {
                    $(".selector").val("所有人可见");
                }
                $("#hidden-id").html($bid);
            }
        });
    })
    if(flag)
    {
        var flag=true;
        $('.book-div').each(function (i){
            if($(this).data("myid")==bid)
            {
                $(this).addClass("selected-book");
                flag=false;
            }
        });
        if(flag)
        {
            $(".book-div").first().addClass("selected-book");
        }
    }
    else
    {
        $(".book-div").first().addClass("selected-book");
    }
    loadnotes();
}
function loadnotes() {
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/note/getnotes",
        data:"bookid="+$(".selected-book").data("bookid"),
        datatype: "html",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            //alert(data);
            notenote(data);
        }
    });
}
function readnote() {
    var noteid=$(".selected-book",parent.document).data("bookid");
    var notename=$(".selected-note",parent.document).data("myid");
    var mytitle=$(".selected-note",parent.document).data("myname");
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/note/readnote",
        data:"bookname="+noteid+"&notename="+notename,
        datatype: "html",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            var editor=$("#editor",$("#iframe1").contents());
            var looker=$("#looker",$("#iframe1").contents());
            var title=$("#notename",$("#iframe1").contents());
            var revise=$("#revise",$("#iframe1").contents());
            var view=$("#view",$("#iframe1").contents());
            editor.html(data);
            if(view.hasClass("hidden"))
            {
                view.removeClass("hidden");
                revise.addClass("hidden");
            }
            loadread();
            looker.html(data);
            title.html(mytitle);
            loadlabel();
        }
    });
}
function loadlabel() {
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
            var editor=$("#label-div",$("#iframe1").contents());
            editor.html(data);
            $(".notespan",$("#iframe1").contents()).click(function () {
                if($(this).text()!=$(".selected-span",$("#iframe1").contents()).text())
                {
                    $(".selected-span",$("#iframe1").contents()).removeClass("selected-span");
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
$(document).ready(function(){
    $('#repeat').alert();
    $("#createbooks").ready(function () {
        $("#createbooks").mouseover(function () {
            $("#createbooks").addClass("littlehand");
        })
    })
    $('#myModal').modal('hide');
    $("#books-block").ready(function () {
        loadbooks();
    })
    var lastTime;
    $("#search-event").keyup(function (e) {
        lastTime = e.timeStamp;
        setTimeout(function () {
            if (lastTime - e.timeStamp == 0) {
                $.ajax({
                    type: "GET",
                    url:  "/web_project/index.php/book/find",
                    data:"bookname="+$("#search-event").val().toString(),
                    datatype: "html",
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        bookbook(data);
                    }
                });
            }
        }, 1000);
    });
    var lastTime1;
    $("#search-notes").keyup(function (e) {
        lastTime1 = e.timeStamp;
        setTimeout(function () {
            if (lastTime1 - e.timeStamp == 0) {
                $.ajax({
                    type: "GET",
                    url:  "/web_project/index.php/note/find",
                    data:"notename="+$("#search-notes").val().toString() + "&bookid="+$(".selected-book").data('bookid'),
                    datatype: "html",
                    async: true,
                    error: function(request) {
                        alert("Connection error");
                    },
                    success: function(data) {
                        notenote(data);
                    }
                });
            }
        }, 1000);
    });
    $("#iframe1").on("load", function(event){//判断 iframe是否加载完成  这一步很重要
        var editor=$("#editor",this.contentDocument);

        $("#save",this.contentDocument).click(function () {
            var noteid=$(".selected-book",parent.document).data("bookid");
            var notename=$(".selected-note",parent.document).data("myid");
            var str=editor.html().replace(/<p[^<>]*>([^<>]*)<\/p>/gi, '<div>$1</div>');
            $.ajax({
                type: "POST",
                url:  "/web_project/index.php/note/savetext",
                data:"bookname="+noteid+"&notename="+notename+"&str="+str,
                datatype: "html",
                async: false,
                error: function(request) {
                    alert("Connection error");
                },
                success: function(data) {
                    //alert(data);
                    changeread();
                }
            });
        })
        readnote();
    });

});

// $(function () { $('#myModal').modal({
//     keyboard: false
// })});
function addbook() {
    alert("go");
}
$("#submit-books").click(function(){
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/book/add",
        data:"bookname="+$("#bookname").val().toString(),
        datatype: "text",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            if(data=='success')
            {
                loadbooks();
                var id=$("#bookname").val();
                var name='#book-'+id;
                if($(".selected-book").data("myid")!=id)
                {
                    $(".selected-book").removeClass("selected-book");
                    $(name).addClass("selected-book");
                }
                $("#bookname").val("");
                $('#myModal').modal('hide');
                $(".repeat-name").each(function (i) {
                    $(this).addClass("hidden");
                })
                loadnotes();
            }
            else
            {
                $("#bookname").focus();
                $(".repeat-name").removeClass("hidden");
            }
        }
    });
})
$("#submit-books2").click(function(){
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/note/add",
        data:"notename="+$("#bookname2").val().toString()+"&bookid="+$(".selected-book").data("bookid"),
        datatype: "text",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            if(data=='success')
            {
                loadbooks();
                var id=$("#bookname2").val();
                var name='#book-'+id;
                if($(".selected-note").data("myname")!=id)
                {
                    $(".selected-note").removeClass("selected-note");
                    $('.note-div').each(function (i){
                        if($(this).data("myname")==id)
                        {
                            $(this).addClass("selected-note");
                            flag=false;
                        }
                    });
                }
                $("#bookname2").val("");
                $('#myModal2').modal('hide');
                $(".repeat-name").each(function (i) {
                    $(this).addClass("hidden");
                })
                readnote();
            }
            else
            {
                $("#bookname2").focus();
                $(".repeat-name").removeClass("hidden");
            }
        }
    });
})
$(".cancel").click(function () {
    $("#bookname2").val("");
    $("#bookname").val("");
    $(".repeat-name").each(function (i) {
        $(this).addClass("hidden");
    })
})
$("#submit-option").click(function(){
    $id=0;
    if($(".selector").val()=="自己可见")
    {
        $id=1;
    }
    else
    {
        $id=0;
    }
    $.ajax({
        type: "GET",
        url:  "/web_project/index.php/authority/changeread",
        data:"bookid="+$("#hidden-id").html().toString()+"&isbook="+true+"&read="+$id,
        datatype: "text",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            $('#bookoption').modal('hide');
        }
    });
})
function loadread() {
    // $.ajax({
    //     type: "GET",
    //     url:  "/web_project/index.php/authority/canread",
    //     data:"noteid="+$(".selected-note").data("myid").toString()+"&isbook="+false,
    //     datatype: "text",
    //     async: false,
    //     error: function(request) {
    //         alert("Connection error");
    //     },
    //     success: function(data) {
    //         if(data==1)
    //         {
    //             $(".selector",$("#iframe1").contents()).val("自己可见");
    //         }
    //         else
    //         {
    //             $(".selector",$("#iframe1").contents()).val("所有人可见");
    //         }
    //     }
    // });
}
function changeread() {
    $id=0;
    if($(".selector",$("#iframe1").contents()).val()=="自己可见")
    {
        $id=1;
    }
    else
    {
        $id=0;
    }
    $.ajax({
        type: "GET",
        url:  "/web_project/index.php/authority/changeread",
        data:"noteid="+$(".selected-note").data("myid").toString()+"&isbook="+false+"&read="+$id,
        datatype: "text",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
        }
    });
}