@if (count($errors) > 0)
    <!-- show list of errors -->
    <div class="alert alert-danger">
        <strong>o no, something went wrong :(</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
