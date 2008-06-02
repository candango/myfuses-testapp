<h3>Json Example</h3>
<h4>Entity ( name: <?=$data->getName()?>, value: <?=$data->getValue()?> )</h4>
<table border="1">
    <tr>
        <th colspan="2">Itens</th>
    </tr>
    <tr>
        <th>Name</th>
        <th>Value</th>
    </tr>
    <?foreach( $data->getItems() as $item ) {?>
        <tr>
            <td><?=$item->getName()?></td>
            <td><?=$item->getValue()?></td>
        </tr>
    <?}?>
</table>
<p>This example uses the data:fromJson verb to get json data from an url.
The action that produces the json data is 
<a href="<?=MyFuses::getMySelfXfa("getJsonData")?>" target="_blank">
rest.toJson</a></p>