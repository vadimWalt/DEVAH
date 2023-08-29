<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class QuizzController extends Controller
{
    public function index()
    {
        return view('quiz.quizOption');
    }

    public function displayQuizz(Request $request)
    {
        $apiKey = 'xDiOEIUTuaow79MaqP84np7SfnuyWFNcXauKfqLp';

        $category = $request->input('category');
        $limit = $request->input('limit');
        $difficulty = $request->input('difficulty');

        $apiUrl = "https://quizapi.io/api/v1/questions?apiKey=$apiKey&limit=$limit&category=$category&difficulty=$difficulty";

        $response = Http::get($apiUrl);

        if ($response->failed()) {
            abort(500, 'Error fetching data from API');
        }

        $data = $response->json();
        
        return view('quiz.quiz', ['quizData' => $data]);
    }


    public function displayCorrection(Request $request){


        $submitedData = $request->all(); // Get all form responses
       


    return view("quiz.quizResultsBizz",[
            "submitedData"=>$submitedData,
    ]);
    }

  
    

}