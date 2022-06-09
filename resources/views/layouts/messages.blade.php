@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-danger">
        {{session('warning')}}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-warning">
        {{session('delete')}}
    </div>
@endif
