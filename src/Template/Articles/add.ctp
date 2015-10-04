<h3>Ajouter un article</h3>

<?= $this->Form->create($article) ?>
    <?= $this->Form->input("name",["label" => "Titre"]) ?>
    <?= $this->Form->input("content",["label" => "Contenu","id" => "markdown","class" => "markdown","style" => "width: 100%;"]) ?>
    <?= $this->Form->input("description") ?>
    <?= $this->Form->input("categorie_id") ?>
    <?= $this->Form->button("Valider",['type' => 'submit']) ?>
<?= $this->Form->end() ?>

<?= $this->Html->script("jquery.markitup",["block" => "script"]) ?>
<?= $this->Html->script("markitup_set",["block" => "script"]) ?>
<?= $this->Html->css("markitup_skin_style",["block" => "css"]) ?>
<?= $this->Html->css("markitup_set_style",["block" => "css"]) ?>

<!-- <script language="javascript">
$(document).ready(function()	{
    $('#markdown').markItUp(myMarkdownSettings);
});
</script> -->

<?= $this->Html->script("jquery.textcomplete",["block" => "script"]); ?>
<?= $this->Html->script("Articles.add",["block" => "script"]); ?>
<?= $this->Html->css("textcomplete",["block" => "css"]); ?>

<br>
