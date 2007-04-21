<h3>If Example</h3>
<b>User Status:</b> <?=$status? "Informed" : "Not Informed" ?><br>
<?if( $status ){?>
<a href="<?=MyFuses::getMySelfXfa( "goToMyself" )?>">Switch Status</a>
<?}else{?>
<a href="<?=MyFuses::getMySelfXfa( "goToMyself" )?>&pessoa=1">Switch Status</a>
<?}?>
<br> 