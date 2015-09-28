<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Créer un compte</legend>
        <?= $this->Form->input('username',['label' => ['text' => 'Pseudo']]) ?>
        <?= $this->Form->input('password',['label' => ['text' => 'Mot de passe']]) ?>
        <?= $this->Form->input('mail',['type' => 'email']) ?>
        <div class="g-recaptcha" data-sitekey="6LdDWQ0TAAAAAL2iNkd45eNeg8hQ_50VGESP9FeE"></div>
    </fieldset>
<?= $this->Form->button("Valider"); ?>
<?= $this->Form->end() ?>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>
