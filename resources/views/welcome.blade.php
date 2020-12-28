@extends('layouts.app')

@section('content')
    <div class="container bg-light">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/save" method="POST" d-flex flex-column">
            @csrf
            <div class="row">
                <label class="col-3" for="name">ФИО</label>
                <input class="col" type="text" name="name">
            </div>

            <div class="row mt-3">
                <label class="col-3" for="number">Телефон</label>
                <input class="col" type="text" name="number">
            </div>

            <div class="row mt-3">
                <label class="col-3" for="tariff">Тариф</label>
                <div class="input-group col-9">
                    <select class="custom-select" name="tariff" id="inputGroupSelect01">
                        <option selected disabled>Выберите тариф</option>
                        @foreach ($tariffs as $tariff)
                            <option value="{{$tariff->id}}">{{$tariff->name}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

            <div class="row mt-3">
                <label class="col-3" for="day">День доставки</label>
                <input class="col" type="date" name="day" min="{{$tomorrow}}">
            </div>

            <div class="row mt-3">
                <label class="col-3" for="day">Адрес доставки</label>
                <input class="col" type="text" name="address">
            </div>

            <button class="btn btn-primary mt-3" type="submit">Submit</button>
        </form>
    </div>
@endsection
