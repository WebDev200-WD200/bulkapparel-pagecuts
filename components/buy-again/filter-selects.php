<select class="select select--primary">
    <?php foreach($items as $item):?> 
        <option  <?=isset($item['selected']) ? 'selected' : ''; ?>  value="<?=$item['value']?>">
            <?=$item['name']?>
        </option>
    <?php endforeach?> 
</select>