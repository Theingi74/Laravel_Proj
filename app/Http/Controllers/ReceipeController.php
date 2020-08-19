<?php

namespace App\Http\Controllers;

use App\Receipe;
use App\Category;
use App\test;
use App\Mail\ReceipeStored;
use App\Events\ReceipeCreatedEvent;
use App\User;
use App\Notifications\ReceipeStoredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReceipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$pagination = Receipe::paginate(5);
        dd($pagination);*/
        /*$data = Receipe::where('author_id',auth()->id())->get();*/
        $data = Receipe::where('author_id',auth()->id())->paginate(5);
        /*dd($data);*/
        /*dd(auth()->check());*/
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*dd(request()->all());*/
       $user = User::find(1);
       /*dd($user);*/
       $user->notify(new ReceipeStoredNotification());
/*       echo "sent notification";
       exit();*/
       $receipe =Receipe::create($this->validation($request) + ['author_id' => auth()->id()]);
       /*event(new ReceipeCreatedEvent($receipe));*/
       return redirect('receipe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function show(Receipe $receipe)
    {

       /* dd($test);*/
        /*dd($receipe->categories->name);*/
      /*  if ($receipe->author_id != auth()->id()) {
            abort(404);
        }*/
        $this->authorize('view',$receipe);
        return view('show',compact('receipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::all();
        $receipe = Receipe::find($id);
        $this->authorize('view',$receipe);
        return view('edit',compact('receipe','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function update(Receipe $receipe, Request $request)
    {
        $validatedData = $this->validation($request);

        $receipe->update($validatedData);
        return redirect('receipe')->with("session_message","Receipe has been Successfully Updated!!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipe $receipe)
    {
        $receipe->delete();
        session()->flash("session_message","Receipe has been Successfully deleted!!");
        return redirect('receipe');
    }

    public function validation($request)
    {
         $validatedData = $request->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category' => 'required',
    ]);
         return $validatedData;
    }
}
