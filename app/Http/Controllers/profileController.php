<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inbox;

class profileController extends Controller
{
    public function updateInbox(Request $request){
    	//return $request->all();

        //Gets the input from the form we passesd via AJAX
    	$mId = $request->msgId;
    	$update = Inbox::where('id', $mId)
    				->update([
    					'status' => 0
    				]);
    	//For debugging purposes, check console tab for the message
    	if($update){
    		echo "Status updated successfully";
    	}
    }
}
