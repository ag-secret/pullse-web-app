<h3>
    <small>
    	<?php if (!empty($breadcrumb['children'])): ?>
    		<?php foreach ($breadcrumb['children'] as $key => $item): ?>
	            <?= $this->Html->link($item['label'], $item['url']) ?> / 
	        <?php endforeach ?>
    	<?php endif ?>
    </small>
    <?= $breadcrumb['parent'] ?>
</h3>
<hr>