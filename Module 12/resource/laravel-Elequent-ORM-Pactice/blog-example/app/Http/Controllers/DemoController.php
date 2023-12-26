<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

class DemoController extends Controller
{
    function DemoAction(){
        return User::with(['post','post.PostTag.tag'=>function(){
        }])->get();
    }

    
}
