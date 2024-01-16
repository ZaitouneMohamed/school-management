<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\class_subject;
use App\Models\Classe;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function index()
    {
        $data = class_subject::getData();
        return view('admin.class_subject.index', compact("data"));
    }

    public function create()
    {
        $classes = Classe::all();
        $subjects = Subject::all();
        return view('admin.class_subject.create', compact("classes", "subjects"));
    }

    public function store(Request $request)
{
    $request->validate([
        'classe_id' => 'required',
    ]);

    // Retrieve the authenticated user's ID
    $createdBy = auth()->id();

    if ($request->subjects) {
        $class = Classe::find($request->classe_id);

        // For each subject, set the created_by field before syncing
        foreach ($request->subjects as $subjectId) {
            $class->subjects()->syncWithoutDetaching([$subjectId => ['created_by' => $createdBy]]);
        }

        return redirect()->route("admin.class_subject.index")->with([
            "success" => "All good"
        ]);
    } else {
        return redirect()->back()->with([
            "error" => "No subject selected"
        ]);
    }
}
}
