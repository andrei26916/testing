@extends('layout.head')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="raw">
        <form action="{{route('register')}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="login" placeholder="ivan@example.net" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="ivan@example.net" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" placeholder="***" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="***" required>
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
@endsection
