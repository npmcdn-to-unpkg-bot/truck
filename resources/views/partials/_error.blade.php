@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (!empty($success))
    <div class="alert alert-success">
        <ul>
            <li>{{ $success }}</li>
        </ul>

    </div>
@endif
