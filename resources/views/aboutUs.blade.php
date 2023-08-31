<x-layout>

    <link rel="stylesheet" href="{{ asset('/styles/aboutUsStyle.css') }}">

   


        
        {{--<x-layout>

@section('content')
    <div class="container">
        <h1>About Us</h1>
        <div class="row">
            @foreach($developers as $developer)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $developer['image']) }}" class="card-img-top" alt="{{ $developer['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $developer['name'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $developer['role'] }}</h6>
                            <p class="card-text">{{ $developer['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<x-layout/>--}}




<x-developer-card>
    
    </x-developer-card>

</x-layout>
