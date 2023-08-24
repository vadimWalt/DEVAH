<x-layout>
    <!-- Display quiz data -->

    @php
        $quizData = session("quizData");
        // remove the token 
        $submitCleaned = array_splice($submitedData,1);
        
    @endphp

    <h2 style="text-align: center">correction of the quizz !</h2>
    <h3></h3>


   @for ($i = 0; $i < count($submitCleaned); $i++)
        @php
            // represent the question
            $question =$quizData[$i]["question"];
            // represent the text linked to your response
            $selectedAnswerText =  $quizData[$i]["answers"][$submitCleaned[$i]];
            //represent the character of your response 
            $selectedAnswer =  str_split($submitCleaned[$i])[7];
        @endphp
        
        {{-- display the  question 1 : and the question itself --}}
       <h2> question {{$i+1}} :    {{$question}} </h2>
       {{-- represent the character of the selected answer and the text linked to the selected answer  --}}
       <b>your answer : </b> {{$selectedAnswer}} / {{$selectedAnswerText}} <br>


        {{-- loop over all the array of correct_answer
            fortmat is  answer_a_correct = "true" 
                         answer_b_correct = "false" --}}
        @foreach ($quizData[$i]["correct_answers"] as  $key => $value)

            @php
                // search for the correct value in the list 
                if ($value=="true") {
                    // extract the character from the question
                   $justAnswer = str_split($key)[7];
                    
              
                //    convert justAnswer from  a to answer_a
                    $justAnswerLong = "answer_".$justAnswer;

                        
                //    and now ask the the inital quizz data the text and the good answer
                // did it by searching in the answer fiel the valeu retrieve from the submit as answer_a for exemple

                   $textRelatedtoAnswer = $quizData[$i]["answers"][$justAnswerLong];
                   
                    echo "Correct answer :  $justAnswer / ".htmlspecialchars($textRelatedtoAnswer)."<br>";
                }

                   
                
            @endphp

            
        @endforeach

         <br> <hr> <br>

   @endfor



</x-layout>
