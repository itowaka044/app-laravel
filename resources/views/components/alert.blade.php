@if (session()->has('success'))
    <div>
        <p style="color:green"><strong>{{ session('success') }}</strong></p>
    </div>
    <br>
@endif

@if (session()->has('message'))
    <div>
        <p style="color:blue"><strong>{{ session('message') }}</strong></p>
    </div>
    <br>
@endif

@if (session()->has('error'))
    <div>
        <p style="color:red"><strong>{{ session('error') }}</strong></p>
    </div>
    <br>
@endif

@if($errors->any())

    @foreach ($errors->all() as $err)
            
        <p style="color: red">{{ $err }}</p>
        <br>
            
    @endforeach
@endif

