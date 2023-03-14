<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class DriverController extends Controller
{
    public function index()
    {
        $drivers=Driver::latest()->paginate(4);
        // dd($drivers);


        return view('driver/drivers',compact('drivers'));
    }
    public function add()
    {
        $buses = DB::table('buses')->get();
        return view('driver/add',compact('buses'));
    }


    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        $buses =   Bus::where('id','!=',$driver->bus_id )->get();
        // dd($driver);
        return view('driver/edit',compact('driver','buses'));
    }




    public function store(Request $request)
    { 
   $validation=$request->validate([
        'name'          =>'required|string|min:2|max:50',
        'phone'         =>'required|min:11|max:11',
        'national'      =>'required|min:10|max:15',
        'license'       =>'required',
        'image'         =>'nullable|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
         ]);
        if ($request->file('image')!==null)
        {
            $image=$request->file('image');
                $ext= $image->getClientOriginalExtension();
                $image_new_name =uniqid().'.'.$ext;
                $image->move(public_path('images'),$image_new_name);
            }
        Driver::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'national_id'=> $request->national,
            'license_id'=>$request->license,
            'image'=>$image_new_name,
            'bus_id'=>$request->bus
            ]
        );
        return redirect()->route('drivers.index');
            
    }

    function update(Request $request,$id)
    {
        $validation=$request->validate([
            'name'          =>'required|string|min:2|max:50',
            'phone'         =>'required|min:11|max:11',
            'national'      =>'required|min:10|max:15',
            'license'       =>'required',
            'image'         =>'nullable|image|mimes:png,jpg,PNG,JPG,JPEG,jpeg',
             ]);

        $driver = Driver::find($id);
        $image_new_name= $driver->image;

        // return $request;
            if( !is_Null($driver->image) && !is_Null($request->file('image')) ) //image in DB check
                {
                            unlink(public_path("images/$driver->image"));
                            $image=$request->file('image');
                            $ext= $image->getClientOriginalExtension();
                            $image_new_name =uniqid().'.'.$ext;
                            $image->move(public_path('images'),$image_new_name);
                    }
            if( is_Null($driver->image) && !is_Null($request->file('image')))
                    {     
                            
                            $image=$request->file('image');
                            $ext= $image->getClientOriginalExtension();
                            $image_new_name =uniqid().'.'.$ext;
                            $image->move(public_path('images'),$image_new_name);
                    }

// Updating data
        
       
        $driver->image = $image_new_name;
        $driver->name = $request->name;
        $driver->phone = $request->phone;
        $driver->national_id = $request->national;
        $driver->license_id = $request->license;
        $driver->bus_id = $request->bus;
       $driver->save();
        return redirect()->route('drivers.index');
    }

    public function destroy($id)
    {
       $driver=Driver::find($id);
        $driver->delete();
        return redirect()->back();
    }
}
