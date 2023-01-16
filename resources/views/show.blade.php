@extends('layout.head')

@section('content')

<div class="row">
    <div class="list-group">
        @foreach($feedbacks as $item)
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$item->name}}</h5>
                    <small>Оценка: {{$item->rating}}</small>
                </div>
                <p class="mb-1">{{$item->text}}</p>
                <small>Дата: {{$item->created_at->format('d.m.Y')}}</small>
            </a>
        @endforeach
    </div>

    @if (\Illuminate\Support\Facades\Auth::check())
        <div class="row">
        <form class="row g-3 needs-validation" action="{{route('store')}}" method="post">
            <h3>Оcтавить отзыв</h3>

            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" placeholder="Иван" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Рейтинг</label>
                <input type="number" min="1" max="5" class="form-control" name="rating" placeholder="5" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
                <textarea class="form-control" name="text" rows="3" placeholder="Все отлично" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    @endif
</div>
@endsection

