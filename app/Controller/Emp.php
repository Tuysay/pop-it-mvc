<?php

namespace Controller;


use Model\Department;
use Model\Disciplines;
use Model\Employee;
use Model\Posts;
use Src\Request;
use Src\View;
use Validator\Validator;
use Validators\ValidationRules;
use Validators\Image;


class Emp
{

    public function add_disciplines(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), ValidationRules::getRules('add_disciplines'), ValidationRules::getMessages());


            if ($validator->fails()) {
                return new View('site.add_disciplines',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Disciplines::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }
        return new View('site.add_disciplines');
    }

    public function add_department(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), ValidationRules::getRules('add_department'), ValidationRules::getMessages());

            if ($validator->fails()) {
                return new View('site.add_department',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Department::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }
        //var_dump((new View())->render('authorised.addDepartment')); die();
        return new View('site.add_department');
    }

    public function add_posts(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), ValidationRules::getRules('add_posts'), ValidationRules::getMessages());


            if ($validator->fails()) {
                return new View('site.add_posts',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Posts::create($request->all())) {
                app()->route->redirect('/hello');
            }
        }
        return new View('site.add_posts');
    }

    public function add_employee(Request $request): string
    {
        $departments = Department::all();
        $posts = Posts::all();
        $disciplines = Disciplines::all();


        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), ValidationRules::getRules('add_employee'), ValidationRules::getMessages());

            if ($validator->fails()) {
                return new View('site.add_employee',
                    ['departments' => $departments, 'posts' => $posts, 'disciplines' => $disciplines, 'message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            Image::uploadFile($request, 'photo/');


            if ($request->method === 'POST' && $employee = Employee::create($request->all())) {
                $discipline = Disciplines::find($request->disciplines_id);
                $employee->disciplines()->save($discipline);
                app()->route->redirect('/hello');


            }
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

    public function profile(): string
    {
        $disciplines = Disciplines::all();
        $selectDiscipline = Disciplines::find($_POST['disciplines'] ?? null) ?? Disciplines::all();

        return new View('site.profile', ['disciplines' => $disciplines, 'selectDiscipline' => $selectDiscipline]);
    }












}








