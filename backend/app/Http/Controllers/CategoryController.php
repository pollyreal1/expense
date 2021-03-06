<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = new Category();
        $category = $category->get();

        return response()->json($category);
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
        $category = new Category();
        $category = $category->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if($category){
            $data = [
                'data' => $category,
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
        $category = new Category();
        $category = $category->where('category_id', $request->category_id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if($category){
            $data = [
                'data' => $category,
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
        $category = new Category();
        $category = $category->where('category_id', $id)->delete();

        return response()->json('success');
    }
}
