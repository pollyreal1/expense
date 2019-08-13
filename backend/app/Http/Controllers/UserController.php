<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = new User();
        $user = $user->with('Role')->get();

        return response()->json($user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $user = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => 'secret',
            'role_id' => $request->role_id,
        ]);

        return response()->json($user);
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

    public function ChangePassword(Request $request)
    {
        //
        $user = new User();
        $user = $user->where('id', $request->id)->first();

        // didn't use validator cause tinatamad
        if($request->old_pass == $user->password){

            if($request->password){
                $user = $user->where('id', $request->id)->update(['password'=>$request->password]);
                return response()->json('Success');
            }else{
                return response()->json('Invalid password');
            }
        }else{
            return response()->json('Inavlid old password');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $user = new User();
        $user = $user->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        if($user){
            $data = [
                'data' => $user,
                'status' => 'success',
            ];
        }else{
            $data = [
                'data' => false,
                'status' => 'failed',
            ];
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = new User();
        $user = $user->where('id', $id)->delete();

        return response()->json('success');
    }
}
