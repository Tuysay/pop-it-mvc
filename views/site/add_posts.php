<h2>Регистрация новой должности</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label>Название <input type="text" name="name"></label>
    <button>Зарегистрироваться</button>
</form>

