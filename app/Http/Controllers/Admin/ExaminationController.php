<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function index()
    {
        $data = Exam::with('CreateBy')->paginate(10);
        return view('admin.examinations.index', compact("data"));
    }

    public function ExamSchedules()
    {
        $data = Exam::with('CreateBy')->get();
        $classes = Classe::all();
        $exames = Exam::all();
        return view('admin.examinations.schedules', compact("data","classes","exames"));
    }

    public function calendar()
    {
        $data = Exam::with('CreateBy')->get();
        return view('admin.examinations.calendar', compact("data"));
    }
}
