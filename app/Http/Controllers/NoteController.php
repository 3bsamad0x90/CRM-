<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{
    public function index(){
        // $note = Note::paginate(5);
        $note = Note::all();
        return response()->json(['status' => 'Success', 'data' => $note]);
    }

    public function show($id){
        $note = Note::find($id);
        if(!$note){
            return response()->json(['status' => 'Error'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['status' => 'Success', 'Note' => $note]);
    }


    public function store(Request $request, $customer_id){
        $note = new Note;
        $note->note = $request->note;
        $note->customer_id = $customer_id;
        $data = $note->save();
        if(!$data){
            return response()->json(['status'=> 'error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function update(Request $request, $customer_id, $id){

        $note = Note::where('customer_id', $customer_id)->where('id', $id)->first();
        if(!$note){
            return response()->json(['status' => 'Invalid Customer or Note ID'], Response::HTTP_NOT_FOUND);
        }
        $note->note = $request->note;
        $note->customer_id = $customer_id;
        $data = $note->save();
        if(!$data){
            return response()->json(['status'=> 'error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json(['status' => 'Success', 'data' => $data]);
    }

    public function destroy($customer_id, $id)
    {
        $node = Note::where('customer_id', $customer_id)->where('id', $id)->first();
        if(!$node){
            return response()->json(['status' => 'Invalid Customer or Note ID'], Response::HTTP_NOT_FOUND);
        }
        $data = $node->delete();
        if(!$data){
            return response()->json(['status'=> 'error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json(['status'=>'Success'], Response::HTTP_OK);

    }
}
