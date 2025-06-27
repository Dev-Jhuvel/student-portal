<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::with('course',)
            ->orderBy('firstName')
            ->filter(request(['search', 'filter']))
            ->paginate(5)
            ->withQueryString();

        $courses = Redis::get('courses.category');
        if ($courses) {
            return inertia('Students/StudentIndex', ['students' => $students, 'courses' => json_decode($courses), 'searchTerm' => $request->search, 'filterCourse' => $request->filter]);
        }
        $courses = Course::select('id', 'code')->get();
        Redis::set('courses.category', json_encode($courses), 'EX', 30);
        dd($students);
        return inertia('Students/StudentIndex', ['students' => $students, 'courses' => $courses, 'searchTerm' => $request->search, 'filterParams' => $request->filter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return inertia('Students/StudentCreate', ['courses' => Course::all()->sortBy('name')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'firstName' => 'required|min:3|max:55',
            'lastName' => 'required|min:3|max:55',
            'middleName' => 'nullable',
            'suffix' => 'nullable',
            'birthday' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required',
            'email' => 'required|email|unique:students,email',
            'contactNumber' => 'required|digits:11',
            'barangay' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
            'year' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'schoolYear' => 'required',
        ]);
        $fields['course_id'] = $fields['course'];
        $request->user()->students()->create($fields);

        return redirect()->route('students.index')->with('message', 'Student Information Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {

        return inertia('Students/StudentShow', ['student' => $student->load('course')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return inertia('Students/StudentEdit', ['student' => $student, 'courses' => Course::all()->sortBy('name')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $fields = $request->validate([
            'firstName' => 'required|min:3|max:55',
            'lastName' => 'required|min:3|max:55',
            'middleName' => 'nullable',
            'suffix' => 'nullable',
            'birthday' => 'required',
            'gender' => 'required',
            'province' => 'required',
            'city' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'contactNumber' => 'required|numeric',
            'barangay' => 'required',
            'street' => 'required',
            'houseNumber' => 'required',
            'course' => 'required',
            'year' => 'required',
            'semester' => 'required',
            'schoolYear' => 'required',
        ]);
        $fields['course_id'] = $fields['course'];
        $student->update($fields);

        return redirect()->route('students.show', ['student' => $student])->with('message', 'Student Information Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // dd($student);
        $student->delete();

        return redirect()->route('students.index')->with('message', 'Student Information Deleted');
    }
}
