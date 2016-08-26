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
                $currentuserid = $thread->FK_user_id;
                $currentuser = UsersUse::find($currentuserid);
                $commentcount = Comment::where(['FK_thread_id' => $thread->id, 'deleted' => 0])->count();

                $threadArray[$i] = array($thread,$currentuser->name,$commentcount,$totalvotes);
                $i++;
            }
        }
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
        $commentcount = Comment::where(['FK_thread_id' => $thread->id, 'deleted' => 0])->count();

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
            'votes' => $totalvotes,
            'op' => $opName,
            'commentcount' => $commentcount
        );
        return view ('thread', ['data' => $data],['comments' => $commentArray]);
    }

    public function createThread() {
        return view('createthread');
    }

    public function postThread(Request $request) {
        $thread = new Thread;
        //return dd($request);
        $thread->title = $request->title;
        $thread->url = $request->url;
        $thread->FK_user_id = Auth::user()->id;
        $thread->remember_token = $request->_token;
        $thread->save();

        return Redirect::to(url('/'))->with('message','Thread posted successfully!');
    }

    public function editThread($id) {
        $thread = Thread::find($id);

        return view ('editthread', ['thread' => $thread]);
    }

    public function postEditedThread(Request $request) {
        $thread = Thread::find($request->thread_id);
        $thread->title = $request->title;
        $thread->url = $request->url;

        $thread->save();

        return Redirect::to(url('/'))->with('message','Thread edited successfully!');
    }

    public function deleteThread($id) {
        $thread = Thread::find($id);

        $thread->deleted = 1;
        $thread->save();

        return Redirect::to(url('/'))->with('message','Thread deleted successfully!');
    }


    public function upvote(Request $request) {
        $checkvote = Vote::where(['FK_user_id' => Auth::user()->id, 'FK_thread_id' => $request->article_id])->first();
        $checkifupvote = Vote::where(['FK_user_id' => Auth::user()->id, 'upordown' => 1, 'FK_thread_id' => $request->article_id])->first();

        if ($checkvote == null) {
            $vote = new Vote;
            $vote->upordown = 1;
            $vote->FK_thread_id = $request->article_id;
            $vote->FK_user_id = Auth::user()->id;
            $vote->remember_token = $request->_token;
            $vote->save();

            return Redirect::back()->with('message','Thread upvoted successfully!');

        } elseif ($checkvote != null && $checkifupvote != null) {
            return Redirect::back()->with('message','You have already upvoted this thread!');
        } else {
            $vote = Vote::find($checkvote->id);

            $vote->upordown = 1;
            $vote->save();

            return Redirect::back()->with('message','Vote changed successfully!');
        }
    }

    public function downvote(Request $request) {
        $checkvote = Vote::where(['FK_user_id' => Auth::user()->id, 'FK_thread_id' => $request->article_id])->first();
        $checkifupvote = Vote::where(['FK_user_id' => Auth::user()->id, 'upordown' => 0, 'FK_thread_id' => $request->article_id])->first();

        if ($checkvote == null) {
            $vote = new Vote;
            $vote->upordown = 0;
            $vote->FK_thread_id = $request->article_id;
            $vote->FK_user_id = Auth::user()->id;
            $vote->remember_token = $request->_token;
            $vote->save();

            return Redirect::back()->with('message','Thread downvoted successfully!');

        } elseif ($checkvote != null && $checkifupvote != null) {
            return Redirect::back()->with('message','You have already downvoted this thread!');
        } else {
            $vote = Vote::find($checkvote->id);

            $vote->upordown = 0;
            $vote->save();

            return Redirect::back()->with('message','Vote changed successfully!');
        }
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

    public function editComment($id) {
        $comment = Comment::find($id);

        return view ('editcomment', ['comment' => $comment]);
    }

    public function postEditedComment(Request $request) {

        $comment = Comment::find($request->comment_id);

        $comment->text = $request->body;
        $comment->save();

        return Redirect::back()->with('message','Comment edited successfully!');
    }

    public function deleteComment($id) {
        $comment = Comment::find($id);

        $comment->deleted = 1;
        $comment->save();

        return Redirect::to(url('thread/') . '/' . $comment->FK_thread_id)->with('message','Comment deleted successfully!');
    }
}
