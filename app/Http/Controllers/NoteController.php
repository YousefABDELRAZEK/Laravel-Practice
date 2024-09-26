<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
class NoteController extends Controller
{

//First we manage the view of the HomePage
public function index(){
    $notes = Note::all();
    return view('home', compact('notes'));
}

//Handle the Note creation
public function create(Request $request){
    $content = $request->validate([ 'title' => 'required|max:30',
    'notes' => 'required', ]);
    Note::create($content);
    return redirect()->route('home');
}

//Handle the Edit and Update of the Created notes
public function update(Request $request,$id){
   $content = $request->validate(['title' => 'required|max:30',
    'notes' => 'required', ]);
   $note =  Note::findOrFail($id);
   $note->update($content);
   return redirect()->route('home');
}

//Add a delete func. to destroy the created notes
public function destroy($id){
    $note = Note::findOrFail($id);
    $note->delete();
    return redirect()->route('home');
}
}
