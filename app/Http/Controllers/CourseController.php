<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $courses = Redis::get('courses.all');
        if ($courses) {
            return inertia('Courses/CourseIndex', ['courses' => json_decode($courses)]);
        }
        $courses = Course::withCount('subjects')->orderBy('code')->get();

        Redis::set('courses.all', json_encode($courses), 'EX', 30);
        return inertia('Courses/CourseIndex', ['courses' => $courses]);
    }

    public function create()
    {
        return inertia('Courses/CourseCreate');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|min:5|max:55',
            'code' => 'required|min:2|max:10|unique:courses,code',
            'description' => 'required|min:5|max:255',
            'program_year' => 'required',
        ]);

        Redis::del('courses.all');  
        $request->user()->courses()->create($fields);
        return redirect()->route('courses.index')->with('message', 'New Course Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $subjects = Subject::where('course_id', $course->id)->get();

        return inertia('Courses/CourseShow', ['course' => $course, 'subjects' => $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return inertia('Courses/CourseEdit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $fields = $request->validate([
            'name' => 'required|min:5|max:55',
            'code' => 'required|min:2|max:10|unique:courses,code,' . $course->id,
            'description' => 'required|min:5|max:255',
            'program_year' => 'required',
        ]);
        $course->update($fields);
        Redis::del('courses.all');
        return redirect()->route('courses.show', ['course' => $course])->with('message', 'Course Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        Redis::del('courses.all');

        return redirect()->route('courses.index')->with('message', 'Course Deleted Successfully!');
    }
}
