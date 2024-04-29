<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\States;
use App\Models\User;
use App\Models\Users;
use App\Helper\helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getUsers(Request $request){
        $data = Users::all()->toArray();

        $allState = States::pluck('name', 'id');
        $allCity = City::pluck('name', 'id');

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('state', function($user) use ($allState){
                $stateName = $allState[$user['state']] ?? 'N/A';
                return $stateName;
            })
            ->editColumn('city', function($user) use ($allCity){
                $cityName = $allCity[$user['state']] ?? 'N/A';
                return $cityName;
            })
            ->editColumn('images', function($row){
                $img = explode(', ', $row['images']);
                $data = '<img src="' . asset('storage/uploads') . '/' . $img['0'] . '" class="w-50" alt="" >';
                return $data;
            })
            ->addColumn('action', function ($row){
                $data = '<a href="' . route('edit-user-view', ['id' =>  $row['id'] ]) . '" class="btn btn-primary me-2 btn-sm edit" data-id="' . $row['id'] . '"> Edit </a>';
                $data .= '<button class="btn btn-danger btn-sm delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' . $row['id'] . '"> delete </button>';
                return $data;
            })
            ->rawColumns(['action', 'images'])
            ->make('true');
    }

    public function addUserView(){
        $data = States::all()->toArray();
        return view('admin.users.add-view')->with('data', $data);
    }

    public function addUser(Request $request){

        $val = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        if($val->fails()){
            return response()->json([
                'status' => 400,
                'response' => $val->errors()->first()
            ]);
        }

        //Checking the image tye and then only uploading them into server
        $imageArray = [];
        if($request->hasFile('image')) {
            $files = $request->file('image');
            $allowedfileExtension = ['jpeg','png'];

            foreach ($files as $file) {
                $helper = new helper();
                $filename = $helper->slug($file->getClientOriginalName());

                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension,$allowedfileExtension);
                if($check){
                    $path = $file->storeAs('public/uploads', $filename);
                    $imageArray[] = $filename;
                } else{
                    return response()->json([
                        'status' => 400,
                        'response' => "Only Jpeg or png files are allowed"
                    ]);
                }

            }
        }

        $data = Users::create([
            'name' => $request->name,
            'state' => $request->state,
            'city' => $request->city,
            'images' => implode(", ", $imageArray),
            'hobbies' => !empty($request->hobbies) ?  implode(", ", $request->hobbies) : ''
        ]);

        if($data){
            return response()->json([
                'status' => 200,
                'response' => "User added Successfully"
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'response' => "Failed to add user"
            ]);
        }

    }

    public function editUserView(Request $request, $id){
        $data = [];
        $states = States::all()->toArray();

        //Checking if the $id is setted or not otherwise will return empty array
        if(isset($id)){
            $data = Users::find($id);
            $cityData = City::where('state_id', $data['state'])->get()->toArray();
        }
        return view('admin.users.edit-users')
            ->with('data', $data)
            ->with('state', $states)
            ->with('city', $cityData);
    }

    public function updateUser(Request $request){
        $val = Validator::make($request->all(), [
            'name' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        if($val->fails()){
            return response()->json([
                'status' => 400,
                'response' => $val->errors()->first()
            ]);
        }

        //Checking the image tye and then only uploading them into server
        $imageArray = [];
        if($request->hasFile('image')) {
            $files = $request->file('image');
            $allowedfileExtension = ['jpeg','png'];

            foreach ($files as $file) {
                $helper = new helper();
                $filename = $helper->slug($file->getClientOriginalName());

                $extension = $file->getClientOriginalExtension();

                $check = in_array($extension,$allowedfileExtension);
                if($check){
                    $path = $file->storeAs('public/uploads', $filename);
                    $imageArray[] = $filename;
                } else{
                    return response()->json([
                        'status' => 400,
                        'response' => "Only Jpeg or png files are allowed"
                    ]);
                }

            }
        }

        $user = Users::find($request->id);
        if($user){

            $user->name = isset($request->name) && $request->name != $user->name ? $request->name : $user->name;
            $user->state = isset($request->state) && $request->state != $user->state ? $request->state : $user->state;
            $user->city = isset($request->city) && $request->city != $user->city ? $request->city : $user->city;
            $user->images = !empty($imageArray) ? implode(", ", $imageArray) : $user->images;
            $user->hobbies = !empty($request->hobbies) ?  implode(", ", $request->hobbies) : '';
            $user->save();

            return response()->json([
                'status' => 200,
                'response' => "User added Successfully"
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'response' => "No user found"
            ]);
        }
    }

    public function  delete(Request $request){
        if(isset($request->id) && $request->id != ''){
            $data = Users::find($request->id);
            $data->delete();
            return response()->json([
                'status' => 200,
                'response' => 'Successfully deleted'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'response' => 'No Data found'
            ]);
        }
    }

    public function cityList(Request $request){
        $data = City::where('state_id', $request->id)->get()->toArray();

        return $data;
    }
}
