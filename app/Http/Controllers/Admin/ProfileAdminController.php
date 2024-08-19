<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileAdminController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profileAdmin');
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
     */
    public function store(Request $request)
    {
        // print_r($request->all());die;

        $validation = Validator::make($request->all(),[
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|unique:users,email,'. Auth::User()->id,
            'image'        => 'mimes:jpeg,png,jpg,gif|max:5120',
            'address'      => 'required|string|max:255',
            'twitter_link' => 'string|max:255',
            'insta_link'   => 'string|max:255',
            'fb_link'      => 'string|max:255'
        ]);

        if ($validation->fails()) {
            return error($validation->errors()->first(), 400, []);
            // return response()->json(['status'=>400, 'message'=>$validation->errors()->first()]);
        }else{
            if($request->hasFile('image')){
                $imageName = 'image/'.$request->name.time().'.'.$request->image->extension();
                $request->image->move(public_path('images/'),$imageName);
            }else{
                $imageName = Auth::User()->image;
            }

            $user = User::updateOrCreate(
                ['id' => Auth::User()->id],
                [
                    'name'         => $request->name,
                    'email'        => $request->email,
                    'image'        => $imageName,
                    'phone'        => $request->phone,
                    'address'      => $request->address,
                    'fb_link'      =>  $request->fb_link,
                    'insta_link'   =>  $request->insta_link,
                    'twitter_link' =>  $request->twitter_link
                ],
            );
            // return response()->json(['status' => 200, 'message' => 'User updated successfully', 'user' => $user]);
            // return $this->success([],'updated successfully');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
