<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = DB::table('students')->get();
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'class_name' => 'required',
            'roll'       => 'required|unique:students',
            'address'   => 'required',
        ]);
        // DB::table('students')->insert([
        //     'name' => $request->post('name'),
        //     'class_name' => $request->post('class_name'),
        //     'roll'  => $request->post('roll'),
        //     'address' => $request->post('address'),
        // ]);
        $students = new Student();
        $students->name = $request->name;
        $students->class_name = $request->class_name;
        $students->roll = $request->roll;
        $students->address = $request->address;
        $students->save();
        return back()->with('success', 'Successfully post insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('students')->where('id', $id)->first();
        $data = Student::findOrFail($id);
        return view('students.view', ['student' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = DB::table('students')->find($id);
        $data = Student::findOrFail($id);
        return view('students.edit', ['student' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'class_name' => 'required',
            'roll'       => 'required|unique:students,id,'.$id,
            'address'   => 'required',
        ]);
        // DB::table('students')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'class_name' => $request->class_name,
        //     'roll'  => $request->roll,
        //     'address' => $request->address,
        // ]);
        $students = Student::findOrFail($id);
        $students->name = $request->name;
        $students->class_name = $request->class_name;
        $students->roll = $request->roll;
        $students->address = $request->address;
        $students->save();
        return back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('students')->where('id', $id)->delete();
        $data = Student::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Successfully deleted');
    }
}
