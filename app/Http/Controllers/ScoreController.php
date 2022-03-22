<?php

namespace App\Http\Controllers;

use App\Models\Score;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    /*
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(){
    $data['scores'] = Score::orderBy('id')->paginate(5);
    return view('scores.index', $data);
}
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
public function create(){
    return view('scores.create');
}
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
public function store(Request $request){
    $request->validate([
        'name' => 'required',
        'g1' => 'required',
        'g2' => 'required',
        'g3' => 'required',
    ]);
    $score = new Score;
    $score->name = $request->name;
    $score->g1 = $request->g1;
    $score->g2 = $request->g2;
    $score->g3 = $request->g3;
    $score->total = $score->g1 + $score->g2 + $score->g3;
    $score->save();
    return redirect()->route('scores.index')->with('success','score has been created successfully.');
}
    /**
    * Display the specified resource.
    *
    * @param  \App\Score  $score
    * @return \Illuminate\Http\Response
    */
public function show(Score $score){
    return view('scores.show',compact('score'));
} 
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Score  $score
    * @return \Illuminate\Http\Response
    */
public function edit(Score $score){
    return view('scores.edit',compact('score'));
}
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Score  $score
    * @return \Illuminate\Http\Response
    */
public function update(Request $request, $id){
    $request->validate([
        'name' => 'required',
        'g1' => 'required',
        'g2' => 'required',
        'g3' => 'required',
        /*'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'serial' => 'required',*/
    ]);
    $score = Score::find($id);
    $score->name = $request->name;
    $score->g1 = $request->g1;
    $score->g2 = $request->g2;
    $score->g3 = $request->g3;
    $score->total = $score->g1 + $score->g2 + $score->g3;
    $score->save();
    return redirect()->route('scores.index')->with('success','score Has Been updated successfully');
}
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Score  $score
    * @return \Illuminate\Http\Response
    */
public function destroy(Score $score)
{
    $score->delete();
    return redirect()->route('scores.index')->with('success','score has been deleted successfully');
}
}
