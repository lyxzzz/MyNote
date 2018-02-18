<?php foreach ($books as $note): ?>

    <div class="book-div" id="book-<?php echo $note['bookname']?>" data-myid="<?php echo $note['bookname']?>" data-bookid="<?php echo $note['bookid']?>"">
        <span class="note-span" style="margin-top:0px;font-size:10px !important">
        <?php echo $note['bookname'] ;echo "<br>"?>
        <?php echo $note['times'];echo "条笔记" ?>
        </span>
        <button class="opbook btn btn-primary" data-bookid="<?php echo $note['bookid']?>" data-toggle="modal" data-target="#bookoption">?</button>
        <button class="deletebook btn btn-primary" type="button" data-bookname="<?php echo $note['bookname']?>" data-toggle="modal" data-target="#isdelete">-</button>
        <button class="lookbook btn btn-primary" data-bookname="<?php echo $note['bookname']?>">></button>
    </div>
    <HR style="margin:0;width:300px;color=darkseagreen;FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="80%" SIZE=3>

<?php endforeach; ?>