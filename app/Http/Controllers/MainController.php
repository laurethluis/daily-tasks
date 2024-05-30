<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use App\Models\Phone;
use Illuminate\Http\Request;

class MainController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if(empty($request->input("search"))){

            $data = PersonalData::all();
        }else{
            $data = Phone::join("personal_data","phones.personal_data_id","=","personal_data.id")
            ->where("personal_data.fullname", "like","%".$request->search."%")
            ->get();  
        }


       return view("home.tasks",[
        'personaldata' => $data
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * O padrao de escrita camel
     */
    public function saveDailyTasks(Request $request)
    {
        
        $validated = $request->validate([
            'fullname' => 'required',
            'province' => 'required',
            'nationality' => 'required',
            'age' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ],
        [
                'fullname.required' => 'O campo nome e obrigatorio',
                'province.required' => 'O campo provincia e obrigatorio',

        ]);

       try {
           
        $inputs = $request->all();        
        $data = PersonalData::create($inputs); 
         
        
        Phone::create([
            "phonenumber"=> $request->phone,
            "personal_data_id"=> $data["id"]


        ]);

        dd("salvo com sucesso");


       } catch (\Throwable $th) {
       // dd($th->getMessage());
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            # code...
            if(empty($request->input("search"))){

                return PersonalData::all();
            }else{
                return Phone::join("personal_data","phones.personal_data_id","=","personal_data.id")
                ->where("personal_data.fullname", "like","%".$request->search."%")
                ->get();  
            }
        } catch (\Throwable $e) {
            # code...
        }
        
    
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            # code...
            $data=PersonalData::where("id",$id)->update([
                "fullname" =>$request->fullname,
            ]);

            # code...
            // $phone=Phone::where("id",$id)->update([
            //     "phonenumber" =>$request->phonenumber,
            // ]);

            return redirect()->to('/');

        } catch (\Throwable $e) {
            dd($e->getMessage());
        }


    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            # code...
           $data = PersonalData::find($id)->delete();
            return back();

        } catch (\Throwable $e) {
            # code...
        }
         
    }
       
public function edit($id)
{
    $data = Phone::join("personal_data","phones.personal_data_id","=","personal_data.id")->findOrFail($id);
    return view('pages.edit', compact('data'));
}

public function search(Request $request )
{
    try {
        # code...
        $personaldata = Phone::join("personal_data","phones.personal_data_id","=","personal_data.id")
        ->where("personal_data.fullname", "like","%".$request->search."%")
        ->get();
        return view('home.tasks', compact('personaldata'));
   
    } catch (\Throwable $e) {
       
        dd( $e->getMessage());
    }

    
}


}