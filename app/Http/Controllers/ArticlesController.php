<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    //
    public function articles(){
        DB::table('articles')->insert([
            'user_id' => '1',
            'category_id' => '1',
            'body' => 'این یک نمونه مقاله شماره 1 برای تمرین یادگیری لاراول است'
        ]);
        $articles = DB::table('articles')->get();
        return view('articles' , compact('articles'));
    }
}
