<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {   
      $students_data=Students::all();
      return view('students-list',compact('students_data'));
    }

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
            'mobile'=>'required|digits:10|',
            'address'=>'required',
            'gender'=>'required',
            'status' => 'required' 

        ]);

        $Students = new Students;
        $Students->name = $request->name;
        $Students->email = $request->email;
        $Students->mobile = $request->mobile;
        $Students->address = $request->address;
        $Students->gender = $request->gender;
        $Students->status = $request->status;
              
        $fileName = null;   
        if( $request->hasFile('image') ) {
            $destinationPath = public_path('uploads');
            $file = $request->image;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move($destinationPath, $fileName);            
            $Students->image = $fileName;   
        }       
         $Students->language = json_encode($request->language);              
         $Students->save();
         return redirect('/');
    }

    public function edit(Request $request,$id)
    {
        $students_data= Students::find($id);

        return view('students-edit',compact('students_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile'=>'required',
            'address'=>'required',
            'gender'=>'required',

        ]);

        $students_data= Students::find($id);

          if( $request->hasFile('image') ) {
            $destinationPath = public_path('uploads');
            $file = $request->image;
            $fileName = time() . '.'.$file->clientExtension();
            $file->move($destinationPath, $fileName);
            // dd($fileName);
            $students_data->image = $fileName; 
                       

        }

         $students_data->update($request->all());

        return redirect('/');
    }


    public function destroy($id)
    {
        Students::find($id)->delete();
        return redirect('/');
    }


}
