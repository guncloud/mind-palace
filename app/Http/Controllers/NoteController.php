<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notes;

class NoteController extends Controller {

	public function index()
	{
		$data['notes'] = Notes::orderBy('id','desc')->get();
		return View('notes.index', $data);
	}


	public function create()
	{
		return View('notes.create');
	}

	public function store(Request $request)
	{
		$new = new Notes;
		$new->title = $request->title;
		$new->body = $request->body;
		$new->by = 'Me';
		if($new->save()){
			return redirect('notes')->with('notif', 'Posted');
		}else{
			return redirect('notes')->with('notif', 'Error');
		}
	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{
		if($id){
			$data['note'] = Notes::find($id);
			return View('notes.edit', $data);
		}
	}

	public function update($id, Request $request)
	{
		if($id){
			$note->find($id);
			$note->title = $request->title;
			$note->body = $request->body;
			if($note->save()){
				return redirect('notes')->with('notif', 'Posted');
			}else{
				return redirect('notes')->with('notif', 'Error');
			}
	
		}
	}

	public function destroy($id)
	{
		if($id){
			$note = Notes::find($id);
			$note->delete();
			return "true";
		}
	}

}
