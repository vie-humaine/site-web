<h3>Administration des articles</h3>

<table>
    <thead>
        <tr style="text-align: center;">
            <td>
                Article
            </td>
            <td>
                Validation
            </td>
            <td>
                Modification
            </td>
            <td>
                Actions
            </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $key => $article): ?>
            <tr>
                <td>
                    <?= $this->Html->link($article->name,["action" => "view",$article->id,$article->slug],['target' => '_blank']); ?>
                </td>
                <td style="text-align : center;">
                    <?php if ($article->validate): ?>
                        <span style="color:#46B29D"><i class="fa fa-check"></i></span>
                        <?php else: ?>
                        <span style="color:#DE5B49"><i class="fa fa-times"></i></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?= $article->ModifiedDate ?>
                </td>
                <td style="text-align: center;">
                    <?= $this->Form->postLink("<i class=\"fa fa-check-square-o\"></i>", ['action' => 'validate', $article->id], ['confirm' => 'Valider ou pas?','escape' => false]) ?>
                    <?= $this->Form->postLink("<i class=\"fa fa-trash-o\"></i>", ['action' => 'delete', $article->id], ['confirm' => 'Effacer?','escape' => false]) ?>
                    <?= $this->Html->link("<i class=\"fa fa-pencil-square-o\"></i>",["action" => "edit",$article->id],['escape' => false]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginate">
    <ul>
        <?= $this->Paginator->prev('«') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('»') ?>
    </ul>
</div>
