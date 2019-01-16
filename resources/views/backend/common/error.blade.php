@if ($errors->has())
        <div class='alert alert-danger'>

                @foreach ($errors->all() as $error)
                        <h5 class="error">{{ $error }}</h5>
                @endforeach

        </div>
@endif