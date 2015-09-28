<?php foreach ($articles as $key => $article): ?>

    <h3><?= $this->Html->link($article->name,['controller' => 'articles','action' => 'view',$article->id,$article->slug]) ?></h3>
    <h6>Publié le <?= $article->ModifiedDate ?></h6>
    <p>
        <?= $article->description ?>
    </p>
    <br>
<?php endforeach; ?>

<div class="pagination-centered">
    <ul class="pagination">
        <?= $this->Paginator->prev('« Previous') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('Next »') ?>
    </ul>
</div>
