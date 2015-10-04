<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>

        <h3>Connection</h3>
        <?= $this->Form->input('username',['label' => ['text' => 'Pseudo']]) ?>
        <?= $this->Form->input('password',['label' => ['text' => 'Mot de passe']]) ?>

<?= $this->Form->button('Se Connecter'); ?>
<?= $this->Form->end() ?>
<br>
