<ul class="side-nav">
    <?php foreach ($categories as $key => $category): ?>
        <li><?= $this->Html->link($category->name,["controller" => "categories","action" => "view",$category->id]) ?></li>
    <?php endforeach; ?>
</ul>
