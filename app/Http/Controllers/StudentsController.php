<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class StudentsController extends Controller
{
    public function index()
    {
        $students_data = Students::paginate(5);
        return view('students-list', compact('students_data'));

        
    }

    // student view form
    public function students_form()
    {

        return view('students-add');
    }



    public function insertdata(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required'

        ]);

        $Students = new Students;
        $Students->name = $request->name;
        $Students->email = $request->email;
        $Students->mobile = $request->mobile;
        $Students->address = $request->address;
        $Students->gender = $request->gender;
        $Students->status = $request->status;

        $Students->language = json_encode($request->language);

        $fileName = null;
        if ($request->hasFile('image')) {
            $destinationPath = public_path('uploads');
            $file = $request->image;
            $fileName = time() . '.' . $file->clientExtension();
            $file->move($destinationPath, $fileName);
            $Students->image = $fileName;
        }

        $Students->save();
        return redirect('/index')->with('message', 'User created successfully.');
    }

    public function edit(Request $request, $id)
    {

        $students_data = Students::find($id);

        return view('students-edit', compact('students_data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|digits:10|',
            'address' => 'required',
            'gender' => 'required',
            'language' => 'required',


        ]);
        $Students = Students::find($id);
        //  $Students = new Students;
        $Students->name = $request->name;
        $Students->email = $request->email;
        $Students->mobile = $request->mobile;
        $Students->address = $request->address;
        $Students->gender = $request->gender;
        $Students->status = $request->status;

        $Students->language = json_encode($request->language);


        if (request()->hasFile('image') && request('image') != '') {
            // existing image check and empty check
            $destinationPath = public_path('uploads/' . $Students->image);
            $uploadpath = public_path('uploads');
            // dd($destinationPath);
            if (File::exists($destinationPath)) {
                unlink($destinationPath);
            }
            $file = $request->image;

            $fileName = time() . '.' . $file->clientExtension();
            $file->move($uploadpath, $fileName);
            $Students->image = $fileName;
        }

        $Students->update();
        return redirect('/index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        Students::find($id)->delete();
        return redirect('/index')->with('success', 'User Delete successfully.');
    }

    
}
