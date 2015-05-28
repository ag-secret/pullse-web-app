<h3>
    <small>
    	<?php if (!empty($crumbs)): ?>
    		<?php foreach ($crumbs as $crumb): ?>
	            <?= $this->Html->link($crumb[0], $crumb[1]) ?> / 
	        <?php endforeach ?>
    	<?php endif ?>
    </small>
    <?= $title ?>
</h3>
<hr>