<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= "Merci de rentrer votre pseudo et votre mot de passe" ?></legend>
        <?= $this->Form->input('username',['label' => ['text' => 'Pseudo']]) ?>
        <?= $this->Form->input('password',['label' => ['text' => 'Mot de passe']]) ?>
    </fieldset>
<?= $this->Form->button('Se Connecter'); ?>
<?= $this->Form->end() ?>
</div>
