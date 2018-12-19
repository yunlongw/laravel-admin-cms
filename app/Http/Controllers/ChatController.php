<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19/019
 * Time: 13:40
 */

namespace App\Http\Controllers;

use App\Events\SendMsgEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index()
    {
        return view("chat");
    }

    public function chat(Request $request)
    {
        $message = $request->get('message');
        if ($message) {
            broadcast(new SendMsgEvent($message))->toOthers();
            return response()->json(['result' => 'ok'], 200);
        }
    }
}