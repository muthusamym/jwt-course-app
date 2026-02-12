<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id'=>1,'title'=>'Laravel Basics'],
            ['id'=>2,'title'=>'JWT Authentication'],
            ['id'=>3,'title'=>'API Security']
        ]);
    }
}