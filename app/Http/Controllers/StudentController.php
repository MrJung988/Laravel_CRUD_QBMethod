<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= DB:: table('student')->get();
        return view('home',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('student')->insert([
            'name'=> $request->name,
            'city'=> $request->city,
            'marks'=> $request->marks,
        ]);
        return redirect(route('index'))->with('status', 'Student Added!!');
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students= DB:: table('student')->find($id);
        return view('editform', ['students'=>$students]);
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
        $students= DB:: table('student')->where('id',$id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'marks' => $request->marks,
        ]);
        return redirect(route('index'))->with('status', 'Student Updated!!');



    //     if(isset($students)){
    //         toastr()->success('Student updated!');

    //         return redirect(route('index'));
            
    //     }

    //     toastr()-error('An erorr has occured.');

    //     return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('student')
                    ->where('id', $id)
                    ->delete();
    
        return redirect(route('index'))->with('status', 'Student Deleted!!');
    
    }
}
