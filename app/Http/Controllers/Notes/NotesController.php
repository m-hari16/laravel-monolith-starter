<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Notes;
use App\Utils\Traits\Converter;

class NotesController extends Controller
{
    use Converter;

    public function index()
    {
        $user = Auth::user()->id ?? null;
        $data = Notes::where('user_id', $user)->orderBy('created_at', 'desc')->get(['title', 'slug', 'body', 'created_at']);
        
        return view('pages.notelist', [
            'data' => $data
        ]);
    }

    public function store(Request $req)
    {
        $user = Auth::user()->id;
        $validator = Validator::make($req->all(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return back()->with('validError', $validator->errors()->first());
        }

        $slug = $this->generateSlug($req->title, Notes::cekSlug());

        $data = new Notes;
        $data->title = $req->title;
        $data->slug = $slug;
        $data->body = $req->body;
        $data->user_id = $user;
        $data->save();

        return redirect('/notes')->with('success', 'Data has been stored');
    }

    public function show(Request $req)
    {
        $user = Auth::user()->id ?? null;
        $data = Notes::where('user_id', $user)->where('slug', $req->slug)->first(['slug', 'title', 'body', 'created_at']);

        return view('pages.note', [
            'data' => $data
        ]);
    }

    public function update(Request $req)
    {
        $user = Auth::user()->id;

        $note = Notes::where('user_id', $user)->where('slug', $req->slug)->first();
        if(!$note){
            return back()->with('validError', 'Data not found');
        }

        $validator = Validator::make($req->all(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return back()->with('validError', $validator->errors()->first());
        }

        if($req->title == $note->title){
            $slug = $note->slug;
        } else{
            $slug = $this->generateSlug($req->title, Notes::cekSlug());
        }

        $note->title = $req->title;
        $note->slug = $slug;
        $note->body = $req->body;
        $note->user_id = $user;
        $note->save();

        return redirect('/notes')->with('success', 'Data has been updated');
    }

    public function delete(Request $req)
    {
        $user = Auth::user()->id;

        $note = Notes::where('user_id', $user)->where('slug', $req->slug)->first();
        if(!$note){
            return back()->with('validError', 'Data not found');
        }

        $note->delete();

        return redirect('/notes')->with('success', 'Data has been deleted');
    }
}
