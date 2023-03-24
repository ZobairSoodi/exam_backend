<?php

namespace App\Http\Controllers;

use App\Models\idee;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function insert(Request $req)
    {
        $idea = new idee();
        $idea->email = $req->email;
        $idea->description = $req->description;
        $idea->save();
        return response()->json($idea, 201);
    }

    public function check_email(Request $req)
    {
        $idea = idee::where('email', $req->email)->first();
        if ($idea) {
            return response()->json($idea);
        }
        return response()->json(null, 404);
    }

    public function ordre(Request $req){
        $idea = idee::where('email', $req->email)->first();
        return response()->json($idea->id, 200);
    }

    public function edit(Request $req, $id){
        $idea = idee::where('id', $id)->first();
        return response()->json($idea);
    }

    public function update(Request $req, $id){
        $idea = idee::where('id', $id)->first();
        $idea->email = $req->email;
        $idea->description = $req->description;
        $idea->valid = $req->valid;
        $idea->save();
        return response()->json($idea, 202);
    }

    public function get_all(){
        $ideas = idee::all();
        return response()->json($ideas, 200);
    }

    public function valid($id, $valide){
        $idea = idee::where('id', $id)->first();
        $idea->valid = $valide;
        $idea->save();
        return response()->json($idea, 201);
    }

    public function idea_accepted(){
        $ideas = idee::where('valid', 'true')->get();
        return response()->json($ideas);
    }

    public function idea_accepted_count(){
        $ideas = idee::where('valid', 'true')->get();
        return response()->json($ideas->count());
    }

    public function delete_refused(){
        $ideas = idee::where('valid', 'false')->get();
        foreach ($ideas as $idea) {
            $idea->delete();
        }
        return response()->json(null, 200);
    }
}
