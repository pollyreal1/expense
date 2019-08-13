<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        // $expense = new Expense();
        // $expense = $expense->where('user_id',$id)->get();
        //
        // return response()->json($expense);
    }

    public function dashboard(Request $request){
        $expense = new Expense();
        // $expense = $expense->where('user_id',$request->id)->groupBy('category_id')->get(['amount']);
        // $expense = $expense->where('user_id',$request->id)->groupBy('category_id')
        //    ->selectRaw('sum(amount) as sum, category_id')
        //    ->pluck('sum','category_id');

       $expense = $expense->where('user_id',$request->id)->groupBy('category_id')
          ->selectRaw('sum(amount) as sum, category_id')->with('Category')
          ->get();
        return response()->json($expense);
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
        $expense = new Expense();
        $expense = $expense->create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'entry_date' => $request->entry_date,
        ]);

        if($expense){
            $data = [
                'data' => $expense,
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
        $expense = new Expense();
        $expense = $expense->with('Category')->where('user_id',$id)->get();

        return response()->json($expense);
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
        $expense = new Expense();
        $expense = $expense->where('expense_id', $request->expense_id)->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'entry_date' => $request->entry_date,
        ]);

        if($expense){
            $data = [
                'data' => $expense,
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
        $expense = new Expense();
        $expense = $expense->where('expense_id', $id)->delete();

        return response()->json('success');
    }
}
