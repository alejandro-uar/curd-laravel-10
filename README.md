### CRUD - LARAVEL 

<p>
Conociendo el fujo basico de trabajo de laravel v10, realizando asi mismo las operaciones basicas CRUD:
</p>
- Create
- Read
- Update
- Delete



####READ

    <?php
        	public function index(): View
    		{
        		$notes = Note::all();
        		return view('note.index', compact('notes'));
    		}
    ?>

####CREATE

	<?php
        	public function create(): View
    		{
        		return view('note.create');
    		}

		public function store(Request $request): RedirectResponse
		{
			$request->validate([
				'title' => 'required|max:255|min:3',
				'description' => 'required|max:255|min:3'
			]);
			Note::create([
				"title" => $request->title,
				"description" => $request->description
			]);
			return redirect()->route('note.index');
		}
	?>

####UPDATE

	<?php
		public function edit($note): View
		{
			$myNote = Note::find($note);
			return view('note.edit', compact('myNote'));
		}
		
    	public function update(Request $request, $note): RedirectResponse
		{   
			$note = Note::find($note);
			#$note->update($request->all());

			$note->title = $request->title;
			$note->description = $request->description;
			$note->save();
			return redirect()->route('note.index');
		}
	?>

####DELETE

	<?php
		public function destroy($note): RedirectResponse
		{
		   $note = Note::find($note);
		   $note->delete();
		   return redirect()->route('note.index'); 
		}
	?>

<!-- 
###Images

Image:

![](https://pandao.github.io/editor.md/examples/images/4.jpg)

> Follow your heart.

-->
