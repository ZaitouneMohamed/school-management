<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function MySubjects()
    {
        $data = User::MySubjectAsStudent();
        return view('student.subjects',compact("data"));
    }
}
