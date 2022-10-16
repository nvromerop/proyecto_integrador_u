@if (isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        <!---Lista de errores para el usuario registrar y iniciar-->    
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</i>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('mensaje' , false))
    <?php $data = Session::get('mensaje'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success">
                <i class="fa fa-check"><7i>
                    {{ $message }}
            </div>
        @endforeach
    @else
            <div class="alert alert-success">
                <i class="fa fa-check"><7i>
                    {{ $message }}
    @endif

@endif