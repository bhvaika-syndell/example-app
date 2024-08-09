<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\company; //company table
use App\Models\staff; //staff table


class HomeController extends Controller
{   
    public function adduser(){
      return "HELLO WORLD";
    }

    public function car(Request $request){
        $Name = $request->name;
        

        if ($Name == 'Yashvi'){
            return "Yashvi Darji";
        }else if ($Name == 'Bhavika'){
            return "Bhavika Shejwal";
        }else{
            return "User not found";
        }   

        return $request->name;  
        
        
    }

    public function idwise($id){
        // return response()->json(['id' => $id]); //json format data 
        return  $id;
    }
    

    //insert into database
    public function insert(Request $request){
        try{
        $Sql = company::create($request->all());
        // return $Sql;
        return response()->json('Inserted Successfully',200);

        }catch (\Exception $e) {
            return response()->json($e, 200);
        }
        return $request;
    }

    //view data of table
    public function index() {
        $view = Company::all();
        return response()->json($view);
    }

    //update data
    public function update(Request $request,$id){
        $up = company::find($id);
        $up->name = $request->name;
        $up->address = $request->address;
        $up->employees = $request->employees;
        $up->save();
        return $up;
    }

    //delete data 
    public function delete(Request $request, $id){
        $del=company::find($id);
        if(!$del){
            return response()->json(['message'=>'company not found'], 404);
        }
        $del->delete();
        return response()->json(['message'=>'Deleted Successfully'], 200);
    }


    //-----------------------
    //Form ui wise functions
    public function showForm(){
        return view('form');
    }

    public function submitForm(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $Sql = staff::create($request->all());

     

        return redirect()->route('form.show')->with('success', 'Form submitted successfully!');
        // return response()->json($Sql);
    }

    public function displayData(){
        $staff = staff::all();
        return view('viewdata', compact('staff'));
    }

    public function showeditData($id){
        $staffdata = staff::select("*")->where('id', $id)->first();
        // return $staffdata;
        return view('editform', compact('staffdata'));
    }

    public function updateStaff(Request $request, $id){
      
        // dd($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        $update = staff::find($id);

        $update->name = $request->name;
        $update->email = $request->email;
        $update->message = $request->message;

        $update->save();
        // return response()->json($update);
        // return response()->json(['success'=> 'staff member updated successfully']);
        return redirect()->route('show.data')->with('success', 'Staff member deleted successfully.');
    }

    public function deleteStaff($id){
        $deletestaff = staff::find($id);
        $deletestaff->delete();
        // return response()->json(['success'=> 'Delete successfully', 'data'=> $deletestaff], 200);
        return redirect()->route('show.data')->with('success', 'Staff member deleted successfully.');
    }
}
