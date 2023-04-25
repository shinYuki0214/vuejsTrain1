<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('app');
    }
    public function list()
    {
        return response()->json([
            'users' => User::latest()->get()
        ], Response::HTTP_OK);
    }
}
