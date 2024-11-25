<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', request()->user()->id)  //only get the notes rows that have the user_id column matching the currently authenticated user
            ->orderBy('created_at', 'desc')
            ->paginate(); //this query retrieves all notes, if we use the get() method at the end, ordered by creation date in descending order. We change the get() method to paginate()
        // dd($notes); //dd is a debugging tool that allows you to print the value of a variable to the console. It is like console log in JS.
        return view('note.index', ['notes' => $notes]); //"note.index" means the index.blade file in the note folder. The second argument of the view function, which is the [] in which there are the key value pair array allows us to pass a variable to the view. The notes in quotes in the array is the variable that is in the blade file, this variable is created in the note.index file. Instead of array we can also use compact function
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(['note' => ['required', 'string']]); //validates if the note data in the request is a required and string or not, and then it returns something which gets stored in the data

        $data['user_id'] = $request->user()->id; //We assign the user_id in the request to 1, so that the note is created with this user id. Later will dynamically assign user id from the currently authenticated user, by using the $request or using $request->user()->id
        $note = Note::create($data); //make a note modal with the verified request data. The new note should be automatically added to the database here.
        //Here we are passing an associative array ($data) to the create() metho of the Note modal. But we need to specifiy for the Note modal which fields of the associative array it should take (and also which fields of the database table it should fill). We do that in the Note.php file under Models

        //after you create a new note, we should be directed to the note/show.blade.php file, and we should also pass a session message
        return to_route('note.show', $note)->with('message', 'Note was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }

        $data = $request->validate(['note' => ['required', 'string']]); //validates if the note data in the request is a required and string or not, and then it returns something which gets stored in the data

        //no setting user_id as in store, as we dont change the user_id/set the user_id ourselves/it automatically knows
        //instead of making a new note and passing the request data to it like this $note = Note::create($data);  we will pass the data to the existing note we get from the argument
        $note->update($data);

        //after you create a new note, we should be directed to the note/show.blade.php file, and we should also pass a session message
        return to_route('note.show', $note)->with('message', 'Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        $note->delete();
        return to_route('note.index')->with('message', 'Note was deleted');
    }
}
