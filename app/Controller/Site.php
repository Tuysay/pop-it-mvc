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

    public function add_admin_employee(Request $request): string
    {
        $roles = Role::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_admin_employee', ['roles' => $roles]);
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
        if ($request->method === 'POST' && $employee = Employee::create($request->all())) {
           $discipline = Disciplines::find($request->disciplines_id);
            $employee->disciplines()->save($discipline);
            app()->route->redirect('/hello');
        }

        return new View('site.add_employee', ['departments' => $departments, 'posts' => $posts, 'disciplines' => $disciplines]);
    }




    public function employee_search(): string
    {
        $disciplines = Disciplines::all();
        $searchName = $_POST['employee'] ?? [];
        if (!empty($searchName)) {
            $employees = Employee::whereIn('firt_name', $searchName)->get();
        }


        return new View('site.employee_search', ['employees' => $employees, 'disciplines' => $disciplines,]);
    }
    public function add(): string
    {
        return new View('site.add');
    }
    public function profile(): string
    {
       $disciplines = Disciplines::all();
       $selectDiscipline = Disciplines::find($_POST['disciplines'] ?? null) ?? Disciplines::all();

        return new View('site.profile', ['disciplines' => $disciplines, 'selectDiscipline' => $selectDiscipline]);
    }




























}
