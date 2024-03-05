<?php

namespace Controller;


use Model\Department;
use Model\Disciplines;
use Model\Employee;
use Model\Posts;
use Model\Role;
use Src\Request;
use Src\View;
use Model\User;
use Src\Auth\Auth;



class Site
{
    public function index(): string
    {
        $posts = Posts::all();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello');
    }

    public function signup(Request $request): string
    {
        $roles = Role::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.signup', ['roles' => $roles]);
    }

    public function admin_add_employee(Request $request): string
    {

        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/admin_add_employee');
        }

        // Вызов метода для получения данных из другой таблицы

        // Внедрение данных в представление
        return new View('site.admin_add_employee');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }

        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function add_disciplines(Request $request): string
    {
        if ($request->method === 'POST' && Disciplines::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_disciplines');
    }

    public function add_department(Request $request): string
    {
        $departments = Department::all();

        if ($request->method === 'POST' && Department::create($request->all())) {
            app()->route->redirect('/add_department');
        }


        return new View('site.add_department');

    }

    public function add_posts(Request $request): string
    {

        if ($request->method === 'POST' && Posts::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_posts');
    }

    public function add_employee(Request $request): string
    {
        $departments = Department::all();
        $posts = Posts::all();
        $disciplines = Disciplines::all();
        if ($request->method === 'POST' && Employee::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_employee', ['department' => $departments, 'posts' => $posts, 'disciplines' => $disciplines]);
    }



    public function employee_search(): string
    {
        $searchName = $_POST['employee'] ?? [];
        if (!empty($searchName)) {
            $employees = Employee::whereIn('firt_name', $searchName)->get();
        }


        return new View('site.employee_search', ['employees' => $employees]);
    }
    public function add(): string
    {
        return new View('site.add');
    }
    public function profile(): string
    {
        $disciplines = Disciplines::all();
        $selectedDepartments = $_POST['disciplines'] ?? [];

        if (!empty($selectedDepartments)) {
            $employees = Employee::whereIn('disciplines_id', $selectedDepartments)->get();
        } else {
            $employees = Employee::all();
        }
//        return new View('site.employee_show', ['employees' => $employees, 'departments' => $departments, 'averageAge' => $averageAge, 'employees2' => $employees2]);
//    }

        return new View('site.profile', ['employees' => $employees,'disciplines' => $disciplines]);
    }

//    public function profiledel(): string
//    {
//        $disciplines = Disciplines::all();
//        $selectedDepartments = $_POST['disciplines'] ?? [];
//
//        $employees = Employee::query();
//
//        if (!empty($selectedDepartments)) {
//            $employees->whereNotIn('disciplines_id', $selectedDepartments);
//        }
//
//        $employees->delete();
//
//        return new View('site.profile', ['employees' => $employees, 'disciplines' => $disciplines]);
//    }

//    public function profiledel(): string
//    {
//        $disciplines = Disciplines::all();
//        $selectedDepartments = $_POST['disciplines'] ?? [];
//        $oldDepartmentId = $_POST['old_department_id'] ?? null;
//        $newDepartmentId = $_POST['new_department_id'] ?? null;
//
//        if (!empty($selectedDepartments) && $oldDepartmentId && $newDepartmentId) {
//            Employee::where('disciplines_id', $oldDepartmentId)->update(['disciplines_id' => $newDepartmentId]);
//        }
//
//        $employees = Employee::all();
//
//        return new View('site.profile', ['employees' => $employees, 'disciplines' => $disciplines]);
//    }

    public function disciplines_swap(Request $request): string
    {
        $disciplines = Disciplines::all();
        $selectedDepartments = $_POST['disciplines'] ?? [];
        $selectedEmployees = $_POST['employee'] ?? [];

        $disciplines = Disciplines::all();
//        if ($request->method === 'POST' && Employee::create($request->all())) {
//            app()->route->redirect('/hello');
//        }
        if(!empty($selectedDepartments) && $selectedEmployees) {
            Employee::where('disciplines_id', $selectedEmployees)->update(['id'=> $selectedDepartments]);
        }

        $employees = Employee::all();
        return new View('site.disciplines_swap', ['disciplines' => $disciplines, 'employees' => $employees]);
    }























//    public function employee_department(Request $request): string
//    {
//        $departments = Department::all();
//
//        if (array_key_exists('department', $request->all())) {
//            $selectedDepartment = $request->get('department');
//        } else {
//            $selectedDepartment = [];
//        }
//
//        if (!empty($selectedDepartment)) {
//            $employees = Employee::whereIn('department_id', $selectedDepartment)->get();
//        } else {
//            $employees = Employee::all();
//        }
//
//        return new View('site.employee_department', ['employees' => $employees, 'departments' => $departments]);
//    }




}
