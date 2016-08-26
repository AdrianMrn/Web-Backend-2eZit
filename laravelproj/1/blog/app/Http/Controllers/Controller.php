<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Thread;
use App\Comment;
use App\Vote;
use App\User;
use App\UsersUse;
use Auth;

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
                $currentuserid = $thread->FK_user_id;
                $currentuser = UsersUse::find($currentuserid);
                $commentcount = Comment::where(['FK_thread_id' => $thread->id])->count();
                //echo $commentcount . '<br>';

                $threadArray[$i] = array($thread,$currentuser->name,$commentcount,$totalvotes);
                $i++;
            }
        }

        //return dd($threadArray);
        //$users = UsersUse::all();

        return view ('welcome', ['threads' => $threadArray]);

    }

    public function getThread($id){
        $thread = Thread::find($id);

        $upvotes = Vote::where(['FK_thread_id' => $thread->id, 'upordown' => 1])->count();
        $downvotes = Vote::where(['FK_thread_id' => $thread->id, 'upordown' => 0])->count();;
        $totalvotes = $upvotes - $downvotes;

        $opId = $thread->FK_user_id;
        $op = UsersUse::find($opId);
        $opName = $op->name;

        $comments = Comment::where('FK_thread_id',$id)->get();
        $commentArray[] = array();
        $commentcount = Comment::where(['FK_thread_id' => $thread->id])->count();

        $i = 0;
        foreach ($comments as $comment)
        {
            if ($comment->deleted == 0)
            {
                $currentCommentuserid = $comment->FK_user_id;
                $currentuser = UsersUse::find($currentCommentuserid);

                $commentArray[$i] = array($comment,$currentuser->name);
                $i++;
            }
        }

        $data = array(
            'thread' => $thread,
            //'comments' => $commentArray,
            'votes' => $totalvotes,
            'op' => $opName,
            'commentcount' => $commentcount
        );
        //$threadInfo = ;

        //return dd($data, $commentArray);

        //return view ('thread', ['thread' => $thread],['comments' => $commentArray],['votes' => $totalvotes],['op' => $opName],['commentcount' => $commentcount]);
        //return dd($commentArray);
        return view ('thread', ['data' => $data],['comments' => $commentArray]);
    }

    public function createThread() {

    }

    public function postThread() {

    }

    public function editThread() {

    }

    public function deleteThread() {

    }


    public function upvote(Request $request) {
        //return dd($request);

        $vote = new Vote;
        $vote->upordown = 1;
        $vote->FK_thread_id = $request->article_id;
        $vote->FK_user_id = Auth::user()->id;
        $vote->remember_token = $request->_token;
        $vote->save();

        return Redirect::back()->with('message','Comment upvoted successfully!');
    }

    public function downvote(Request $request) {
        $vote = new Vote;
        $vote->upordown = 0;
        $vote->FK_thread_id = $request->article_id;
        $vote->FK_user_id = Auth::user()->id;
        $vote->remember_token = $request->_token;
        $vote->save();

        return Redirect::back()->with('message','Comment downvoted successfully!');
    }


    public function postComment(Request $request) {
        $comment = new Comment;
        $comment->text = $request->body;
        $comment->FK_thread_id = $request->article_id;
        $comment->FK_user_id = Auth::user()->id;
        $comment->remember_token = $request->_token;
        $comment->save();

        return Redirect::back()->with('message','Comment posted successfully!');
    }

    public function editComment() {


        return Redirect::back()->with('message','Comment edited successfully!');
    }

    public function deleteComment($id) {
        $comment = Comment::find($id);

        $comment->deleted = 1;
        $comment->save();

        return Redirect::back()->with('message','Comment deleted successfully!');
    }

    /*public function getWelcome(){
        $users = UsersUse::with("thread")->get();

        return view ('welcome', ['users' => $users]);
        //return $users;
    }*/
}
