<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend;
use Carbon\Carbon;

class FrontendController extends Controller
{

        function home(){
            $frontends = Frontend::latest()->get();
            return view('home_page', [
                'frontends' => $frontends,
            ]);

        }


        function save_data(Request $request){

                $validator = Validator::make($request->all(),[
                            'name'=>"required",
                            'email'=>"required",
                            'roll'=>"required",
                        ]);


                if($validator->passes()){

                        Frontend::insert([
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'roll'=>$request->roll,
                            'created_at'=>Carbon::now(),
                        ]);

         return response()->json(['status'=>'success', 'message'=>'Data Inserted successfully']);

                    }
                return response()->json(['error'=>$validator->getMessageBag()]);
        }








}
