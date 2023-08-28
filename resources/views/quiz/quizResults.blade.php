<x-layout>
    <link rel="stylesheet" href="{{ asset("/styles/quiz/quizResultsStyle.css") }}">

    <!-- Display quiz data -->

    @php
        $quizData = session('quizData');
        // remove the token
        $submitCleaned = array_splice($submitedData, 1);

        // total number of question for the quiz
        $nbQuestionInQuizz=(count($quizData));

        $nbGoodAnswer = 0;
    @endphp

    <h2 style="text-align: center">correction of the quizz !</h2>


    @for ($i = 0; $i < count($submitCleaned); $i++)
        @php
            // represent the question
            $question = $quizData[$i]['question'];
            // represent the text linked to your response
            $selectedAnswerText = $quizData[$i]['answers'][$submitCleaned[$i]];
            
            //answer_* retrieve from the form
            // dd($submitCleaned[$i]);
            
            //represent the character of your response
            $selectedAnswer = str_split($submitCleaned[$i])[7];
        @endphp

        <div class="question-container"> 
            
           {{-- display the  question 1 : and the question itself --}}
        <h3 class="question"> question {{ $i + 1 }} : {{ $question }} </h3>


        {{-- loop over all the array of correct_answer
            fortmat is  answer_a_correct = "true" 
                         answer_b_correct = "false" --}}
        @foreach ($quizData[$i]['correct_answers'] as $key => $value)
            @php
                // search for the correct value in the list
                if ($value == 'true') {
                    // extract the character from the question
                    $justAnswer = str_split($key)[7];
                
                    //    convert justAnswer from  a to answer_a
                    $justAnswerLong = 'answer_' . $justAnswer;
                
                    // dd($justAnswerLong);
                    //correct answer in a form of answer_*
                
                    //    and now ask the the inital quizz data the text and the good answer
                    // did it by searching in the answer fiel the valeu retrieve from the submit as answer_a for exemple
                
                    $textRelatedtoAnswer = $quizData[$i]['answers'][$justAnswerLong];

                    echo "<p> <b>Correct answer :  $justAnswer </b> <br> " . htmlspecialchars($textRelatedtoAnswer) . '</p>';
                }
                
            @endphp
        @endforeach

        {{-- represent the character of the selected answer and the text linked to the selected answer  --}}

        @if ($submitCleaned[$i] == $justAnswerLong)
            <p  style="color: green"><b>your answer :  {{ $selectedAnswer }} </b> <br> {{ $selectedAnswerText }}</p>
            @php
                $nbGoodAnswer++;
            @endphp
        @else
           <p style="color: red"><b>your answer :  {{ $selectedAnswer }} </b> <br> {{ $selectedAnswerText }}</p>
        @endif

                <hr>
        
        </div>

    
    @endfor

    
        <p class="grade">you grade is : {{$nbGoodAnswer}} / {{$nbQuestionInQuizz}}</p>


</x-layout>
