<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function MyStudents()
    {
        $data = User::MyStudent();
        return view('parent.my-students', compact("data"));
    }
}
