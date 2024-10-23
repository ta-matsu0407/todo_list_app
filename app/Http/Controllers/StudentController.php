<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Inertia\Inertia;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    // ビューから渡ってくる情報は $requestで受け取れる
    {
        // $get = Student::select('id', 'name', 'kana', 'tel')->get();
        // $paginate = Student::select('id', 'name', 'kana', 'tel')->paginate(50);
        // dd($get, $paginate);
        // getとpaginateでview側に送られるデータが異なる

        $students = Student::searchStudents($request->search)
        ->select('id', 'name', 'kana', 'tel')->paginate(50);

        return Inertia::render('Students/Index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Students/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'tel' => $request->tel,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'memo' => $request->memo,
        ]);

        return to_route('students.index')
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return Inertia::render('Students/Show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return Inertia::render('Students/Edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->kana = $request->kana;
        $student->tel = $request->tel;
        $student->email = $request->email;
        $student->postcode = $request->postcode;
        $student->address = $request->address;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->memo = $request->memo;
        $student->save();

        return to_route('students.index')
        ->with([
            'message' => '更新しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return to_route('students.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'danger'
        ]);
        //フラッシュメッセージ:resources/js/Components/FlashMessage.vue
    }
}
