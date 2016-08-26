<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Thread;
use App\Comment;
use App\Vote;
use App\User;
use App\UsersUse;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getWelcome(){
        $threads = Thread::all();
        $threadArray[] = array();

        $i = 0;
        foreach ($threads as $thread)
        {
            if ($thread->deleted == 0)
            {
                $upvotes = Vote::where(['FK_thread_id' => $thread->id, 'upordown' => 1])->count();
                $downvotes = Vote::where(['FK_thread_id' => $thread->id, 'upordown' => 0])->count();;
                $totalvotes = $upvotes - $downvotes;
                //echo $totalvotes . '<br>';
                $currentid = $thread->FK_user_id;
                $currentuser = UsersUse::find($currentid);
                $commentcount = Comment::where(['FK_thread_id' => $thread->id])->count();
                //echo $commentcount . '<br>';

                $threadArray[$i] = array($thread,$currentuser,$commentcount,$totalvotes);
                $i++;
            }
        }

        //return dd($threadArray);
        //$users = UsersUse::all();

        return view ('welcome', ['threads' => $threadArray]);

    }

    public function getThread($id){
        //$id = 2;

        $comments = Comment::where('FK_thread_id',$id)->get();
        $commentArray[] = array();

        $thread = Thread::find($id);

        $i = 0;
        foreach ($comments as $comment)
        {
            if ($comment->deleted == 0)
            {
                $currentid = $comment->FK_user_id;
                $currentuser = UsersUse::find($currentid);

                $commentArray[$i] = array($comment,$currentuser);
                $i++;
            }
        }

        //return dd($commentArray);
        //return dd($thread);

        //return view ('thread', ['thread' => $thread]);
        return view ('thread', ['thread' => $thread],['comments' => $commentArray]);
        //return view ('thread',['comments' => $commentArray]);
    }

    /*public function getWelcome(){
        $users = UsersUse::with("thread")->get();

        return view ('welcome', ['users' => $users]);
        //return $users;
    }*/
}
