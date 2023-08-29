<x-layout>
    <link rel="stylesheet" href="{{ asset('/styles/quiz/quizResultsStyle.css') }}">

    @php
        $quizData = session('quizData');
        array_shift($submitedData);
        $nbGoodAnswer = 0;
        $totalNbAnswer = count($quizData);
        // dd($quizData,$submitedData);
    @endphp

      <div class="topQuiz">

            <h2>topic of the quizz : <b> {{ $quizData[0]['category'] }}</b></h2>
            <h3>Correction</h3>

        </div>

    <div class="correctionContainer">


              @for ($i = 0; $i < count($quizData); $i++)
        <div class="question-container">
            {{-- case with the single answer question --}}

            <h2 class="question">Question {{ $i + 1 }}: {{ $quizData[$i]['question'] }}</h2>

            <div class="answer-container">

                @php
                    // dd($quizData[$i]["answers"]);

                    $wrongAnswer = false;
                @endphp

                {{-- loop over all the answer of the question --}}
                @foreach ($quizData[$i]['answers'] as $key => $value)
                    @if ($value != null)
                        {{-- now we test if the response in the loop is our response AND we check if it's the good one or not --}}
                        @php
                            //value retried from the form for this question
                            // dd($submitedData[$i])
                            $answerKey = $key . '_correct';
                            
                            $isAnswerTrue = $quizData[$i]['correct_answers'][$answerKey];

                            // dd($isAnswerTrue,$key,$submitedData[$i]);
                            //IS ANSWERTRUE CHECK IF IT THE GOOD ANSWER
                            //key is the actual answer in the loop and submitedData[$i] is the useranswer for the
                            //response
                            
                        // if the answer is false and if it's my answer just put in red
                        if ($isAnswerTrue == 'false' && $key == $submitedData[$i]) {
                             echo "<p class='answer bad'><i style='margin-right: 5px' class='fa-solid fa-xmark'></i>" . htmlspecialchars($value) . '</p>';
                            
                
                                // ifthe answer is false and not my response don't touch it, just normal display
                            } elseif ($isAnswerTrue == 'false' && $key != $submitedData[$i]) {
                                echo "<p class='answer'>" . htmlspecialchars($value) . '</p>';

                                // case the answer is the good answer and the user have the good answer 
                            } elseif ($isAnswerTrue == 'true' && $key == $submitedData[$i]) {
                                echo "<p class='answer good'> <i style='margin-right: 5px' class='fa-solid fa-check'></i>" . htmlspecialchars($value) . '</p>';
                                $nbGoodAnswer++;
                                // else just leave it like untouched
                            } elseif ($isAnswerTrue == 'true' && $key != $submitedData[$i]) {
                                echo "<p class='answer good'><i style='margin-right: 5px' class='fa-solid fa-flag-checkered'></i>" . htmlspecialchars($value) . '</p>';
                            }
                            
                        @endphp

                    @endif
                @endforeach

             
                

            </div>

        </div>
    @endfor

     <p class="grade">you grade is : {{$nbGoodAnswer}} / {{$totalNbAnswer}}</p>


    </div>

  
</x-layout>
