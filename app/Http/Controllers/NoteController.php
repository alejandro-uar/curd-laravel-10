<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
 
#Llamo al modelo para hacer uso
use App\Models\Note;

class NoteController extends Controller
{
    public function index(): View
    {
        #Supongamos que deseamos buscar la nota con su id.
        #$note = Note::find($id);
        #return view('note.index', compact('id'));
        //Trae todo las notas
        $notes = Note::all();
        //Pinto la lista en la vista
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {
        #Debe retornar un vista con un formulario
        return view('note.create');
    }

    #Recepcionamos los datos de la peticion, del form CREATE
    public function store(Request $request): RedirectResponse
    {
        //La forma mas basica de guardar
        // $note = new Note;
        // $note->title = $request->title;
        // $note->description = $request->description;
        // $note->save();
        #VALIDACION-EN-CONTROLADOR:
        $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3'
        ]);
        
        //La otra forma:
        Note::create([
            "title" => $request->title,
            "description" => $request->description
        ]);

        return redirect()->route('note.index');
    }
    
    # UPDATE
    public function edit($note): View
    {
        $myNote = Note::find($note);
        return view('note.edit', compact('myNote'));
    }
    public function update(Request $request, $note): RedirectResponse
    {   
        #Filtrado por id, que es lo es se esta mando en la url
        $note = Note::find($note);
        #$note->update($request->all());
        
        #otra forma es:
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();
        return redirect()->route('note.index');
    }

    #DELETE
    public function destroy($note): RedirectResponse
    {
       $note = Note::find($note);
       $note->delete();
       return redirect()->route('note.index'); 
    }

}

