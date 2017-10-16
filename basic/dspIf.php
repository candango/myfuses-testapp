<h3>If Example</h3>
<b>User Status:</b> <?=$status? "Informed" : "Not Informed" ?><br>
<?php if ($status) {?>
<a href="<?=MyFuses::getMySelfXfa( "goToMyself" )?>">Switch Status</a>
<?php } else {?>
<a href="<?=MyFuses::getMySelfXfa( "goToMyself", true, false )?>pessoa=1">Switch Status</a>
<?php }?>
<br>