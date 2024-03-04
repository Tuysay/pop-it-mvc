<h2>Регистрация новой депа</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Название <input type="text" name="name"></label>

    <button>Зарегистрироваться</button>
</form>
<a href="<?= app()->route->getUrl('/department_all') ?>">Поиск сотрудника</a>
