<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

use App\Http\Requests;

class NotesController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNote($notebookId)
    {
        return view('notes.create')->with('id',$notebookId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required|max:20|unique:notes,title',
            'body'=>'required|min:50'

            ]);


        Note::create($request->all());

        $notebookId=$request->notebook_id;

        return redirect()->route('notebooks.show',compact('notebookId'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note=Note::find($id);

        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note= Note::find($id);
        return view('notes.edit',compact('note'));
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
        $inputData= $request->all();

        $note=Note::find($id);
        $note->update($inputData);

        return redirect()->route('notebooks.show',$note->notebook_id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::destroy($id);
        return back();
    }

    
}
