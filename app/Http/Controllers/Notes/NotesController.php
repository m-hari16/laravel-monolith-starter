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

        return redirect('/notes');

    }
}
