<?php

namespace Controller;


use Model\Department;
use Model\Disciplines;
use Model\Employee;
use Model\Posts;
use Src\Request;
use Src\View;

use Src\Validator\Validator;
use Validators\Image;


class Emp
{

    public function add_disciplines(Request $request): string
    {
        if ($request->method==='POST'){
            $validator = new Validator($request->all(), [
                'name'=> ['required','russian'],

            ], [
                'required' => 'Поле :field пусто',
                'russian' => 'Разрешен только русский язык'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
        }


        if ($request->method === 'POST' && Disciplines::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_disciplines');
    }

    public function add_department(Request $request): string
    {
        if ($request->method==='POST'){
            $validator = new Validator($request->all(), [
                'name'=> ['required','russian'],

            ], [
                'required' => 'Поле :field пусто',
                'russian' => 'Разрешен только русский язык'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
        }

        $departments = Department::all();

        if ($request->method === 'POST' && Department::create($request->all())) {
            app()->route->redirect('/add_department');
        }


        return new View('site.add_department');

    }

    public function add_posts(Request $request): string
    {
        if ($request->method==='POST'){
            $validator = new Validator($request->all(), [
                'name'=> ['required','russian'],

            ], [
                'required' => 'Поле :field пусто',
                'russian' => 'Разрешен только русский язык'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
        }

        if ($request->method === 'POST' && Posts::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.add_posts');
    }

    public function add_employee(Request $request): string
    {
        if ($request->method==='POST'){
            $validator = new Validator($request->all(), [
                'firt_name'=> ['required','russian'],
                'last_name'=> ['required','russian'],
                'patronymic'=> ['required','russian'],
                'gender'=> ['required'],
                'address'=> ['required'],
                'img_photo'=> ['required', 'fileType'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'fileType'=>'Недопустимое разрешение файла',
                'number'=> 'Поле :field должно быть числом',
                'russian' => 'Разрешен только русский язык'
            ]);

            Image::uploadFile($request, 'photo/');

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
        }




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
        } else {
            echo "Ты что то намудрил";
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








