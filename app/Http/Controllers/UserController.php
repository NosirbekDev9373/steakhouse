<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response('Bu userlarni royxati', 202);

    }
    public function show($user)
    {

        $user += 1000;
        return view('users.show', [
            'name' => 'Nosirbek',
            'id' => $user,
            'phone' => '906706830'
        ]);

    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        dd($request->name);
    }
    public function edit($userId)
    {
        return $userId . ' ni o\'zgartirish';
    }

}
