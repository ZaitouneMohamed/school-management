<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\ClassSubjectTimeTable;
use App\Models\Week;
use Illuminate\Http\Request;

class ClassTimetable extends Controller
{
    public function ClassTimetableIndex(Request $request)
    {
        $weeks = [];
        if ($request->class_id && $request->subject_id) {
            $classId = $request->class_id;
            $subject_id = $request->subject_id;
            $weeks = Week::leftJoin('class_subject_time_tables', function ($join) use ($classId, $subject_id) {
                $join->on('weeks.id', '=', 'class_subject_time_tables.week_id')
                    ->where('class_subject_time_tables.classe_id', '=', $classId)
                    ->where('class_subject_time_tables.subject_id', '=', $subject_id);
            })
                ->select('weeks.id as week_id','weeks.name as week_name','class_subject_time_tables.start_time','class_subject_time_tables.room_number','class_subject_time_tables.end_time')
                ->get();

            // dd($weeks);
        }
        $classes = Classe::all();
        return view('admin.ClassTimetable.index', compact("classes", "weeks"));
    }

    public function GetSubjects($class_id)
    {
        $subjects = Classe::find($class_id)->subjects;
        return response()->json($subjects);
    }

    public function StoreData(Request $request)
    {
        $data = ClassSubjectTimeTable::where('classe_id', $request->class_id)->where('subject_id', $request->subject_id)->get();
        if ($data->count() > 0) {
            ClassSubjectTimeTable::where('classe_id', $request->class_id)->where('subject_id', $request->subject_id)->delete();
        }
        foreach ($request->timetable as $timetable) {
            if (!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])) {
                ClassSubjectTimeTable::create([
                    'classe_id' => $request->class_id,
                    'subject_id' => $request->subject_id,
                    'week_id' => $timetable['week_id'],
                    'start_time' => $timetable['start_time'],
                    'end_time' => $timetable['end_time'],
                    'room_number' => $timetable["room_number"]
                ]);
            }
        }
        return redirect()->back()->with([
            'success' => 'Class Timetable Added Successfully',
        ]);
    }
}
