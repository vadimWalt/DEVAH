<x-layout>

 

    <!-- Display quiz data -->
    @if (isset($quizData))



        <h2>topic of the quizz : <b> {{ $quizData[0]['category'] }}</b></h2>
        <h3>Difficulty: {{ $quizData[0]['difficulty'] }}</h3>

        <form action="/quiz/results" method="post">
            @csrf


            {{-- loop over all the questions to make the display --}}
            @foreach ($quizData as $question)
                {{-- case of the multiple choice question
                    we avoid qcm in our context --}}
                @while ($question['multiple_correct_answers'] == 'true')
                    @php
                        $apiKey = 'xDiOEIUTuaow79MaqP84np7SfnuyWFNcXauKfqLp';
                        
                        $category = $question['category'];
                        $limit = 1;
                        $difficulty = $question['difficulty'];
                        
                        $apiUrl = "https://quizapi.io/api/v1/questions?apiKey=$apiKey&limit=$limit&category=$category&difficulty=$difficulty";
                        
                        $response = Http::get($apiUrl);
                        
                        if ($response->failed()) {
                            abort(500, 'Error fetching data from API');
                        }
                        
                        $data = $response->json();
                        
                        $question = $data[0];
                    @endphp
                @endwhile



                {{-- case with the single answer question --}}
                <h2>Question {{ $loop->index + 1 }}: {{ $question['question'] }}</h2>
                @foreach ($question['answers'] as $key => $value)
                    @if ($value !== null)
                        <input type="radio" name="{{ $question['id'] }}"
                            value="{{ $key }}">{{ $value }}<br>
                    @endif
                @endforeach

                
                <br>
                <hr>
            @endforeach

            <button>submit</button>
        </form>




    @endif



</x-layout>
