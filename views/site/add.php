<div >
    <button><a href="<?= app()->route->getUrl('/admin_add_employee') ?>">Добавить Пользователя</a></button>
</div>

public function profile(): string
{
$disciplines = Disciplines::all();
$selectDiscipline = Disciplines::find($_POST['disciplines'] ?? null) ?? Disciplines::all();

return new View('site.profile', ['disciplines' => $disciplines, 'selectDiscipline' => $selectDiscipline]);
}