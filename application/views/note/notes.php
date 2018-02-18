<?php foreach ($notes as $note): ?>

    <div class="note-div" id="note-<?php echo $note['noteid']?>" data-myid="<?php echo $note['noteid']?>" data-myname="<?php echo $note['notename']?>">
    <span class="note-span" style="margin-top:0px;font-size:10px !important">
        <?php echo $note['notename'] ;echo "<br>"?>
        <?php foreach ($note['label'] as $lable){ ?>
            <span class="label label-info"><?php echo $lable['lname'] ?></span>
        <?php } ?>
        </span>
    <button class="deletenote btn btn-primary" type="button" data-noteid="<?php echo $note['noteid']?>" data-toggle="modal" data-target="#isdelete">-</button>
    <button class="looknote btn btn-primary" data-noteid="<?php echo $note['noteid']?>">></button>
    </div>
    <HR style="margin:0;width:300px;color=darkseagreen;FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="80%" SIZE=3>

<?php endforeach; ?>