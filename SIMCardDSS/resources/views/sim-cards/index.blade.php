@extends('layouts.layout')

@section('main_content')

    <!-- Alert Message -->
    @include('layouts.alert')

    <h2>Список SIM-карт</h2>

    <a href="{{ route('sim-cards.create') }}" class="btn btn-primary">Добавить SIM-карту</a>

    @if (count($simCards) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>IMEI</th>
                <th>Номер телефона</th>
                <th>ФИО клиента</th>
                <th>Дата регистрации</th>
                <th>Тарифный план</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($simCards as $simCard)
                <tr>
                    <td>{{ $simCard->imei }}</td>
                    <td>{{ $simCard->phone_number }}</td>
                    <td>{{ $simCard->client_name }}</td>
                    <td>{{ $simCard->registration_date }}</td>
                    <td>{{ $simCard->tariff->name }}</td>
                    <td>
                        <a href="{{ route('sim-cards.edit', $simCard) }}"
                           class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{ route('sim-cards.destroy', $simCard) }}" method="POST" class="d-inline">
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
        <p>Нет доступных SIM-карт.</p>
    @endif
@endsection
