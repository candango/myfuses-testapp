<h3><?=$exampleName?></h3>
<h4>Entity ( name: <?=$data->getName()?>, value: <?=$data->getValue()?> )</h4>
<table border="1">
    <tr>
        <th colspan="2">Itens</th>
    </tr>
    <tr>
        <th>Name</th>
        <th>Value</th>
    </tr>
    <?php foreach( $data->getItems() as $item ) {?>
        <tr>
            <td><?=$item->getName()?></td>
            <td><?=$item->getValue()?></td>
        </tr>
    <?php }?>
</table>
<p>This example uses the <?=$verbName?> verb to get <?=$dataType?> data from an url.
The action that produces the <?=$dataType?> data is 
<a href="<?=xfa("getData")?>" target="_blank">
<?=$actName?></a></p>