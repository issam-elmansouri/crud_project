    @if(count($errors))
    <div class='row'>
        <ul class="col-md-4 col-md-offset-6 error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(Session::has('message'))

        <div class='row'>
                <div class="col-md-4 col-md-offset-6 succes" >
                    {{Session::get('message')}}
                </div>
            </div>

    @endif

