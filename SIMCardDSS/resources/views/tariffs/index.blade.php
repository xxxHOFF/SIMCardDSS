@extends('layouts.layout')

@section('main_content')

    @include('layouts.alert')

    <h2>Список тарифных планов</h2>

    <a href="{{ route('tariffs.create') }}" class="btn btn-primary">Добавить тарифный план</a>

    @if (count($tariffs) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название ТП</th>
                <th>Количество доступных минут</th>
                <th>Количество SMS</th>
                <th>Стоимость</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tariffs as $tariff)
                <tr>
                    <td>{{ $tariff->id }}</td>
                    <td>{{ $tariff->name }}</td>
                    <td>{{ $tariff->available_minutes }}</td>
                    <td>{{ $tariff->available_sms }}</td>
                    <td>{{ $tariff->cost }}</td>
                    <td>
                        <a href="{{ route('tariffs.edit', $tariff) }}" class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{ route('tariffs.destroy', $tariff) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Нет доступных тарифных планов.</p>
    @endif
@endsection
