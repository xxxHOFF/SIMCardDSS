@extends('layouts.layout')

@section('main_content')
    <h2>Редактировать SIM-карту</h2>

    <div class="container my-4">
        <form action="{{ route('sim-cards.update', $simCard) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="imei" class="col-sm-2 col-form-label">IMEI сим карты</label>
                <div class="col-sm-10">
                    <input type="text" name="imei" id="imei" class="form-control @error('imei') is-invalid @enderror"
                           value="{{ $simCard->imei }}" required>
                </div>
                @error('imei')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="phone_number" class="col-sm-2 col-form-label">Номер телефона</label>
                <div class="col-sm-10">
                    <input type="text" name="phone_number" id="phone_number"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           value="{{ $simCard->phone_number }}" required>
                </div>
                @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="client_name" class="col-sm-2 col-form-label">ФИО клиента</label>
                <div class="col-sm-10">
                    <input type="text" name="client_name" id="client_name"
                           class="form-control @error('client_name') is-invalid @enderror"
                           value="{{ $simCard->client_name }}" required>
                </div>
                @error('client_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="registration_date" class="col-sm-2 col-form-label">Дата регистрации</label>
                <div class="col-sm-10">
                    <input type="date" name="registration_date" id="registration_date"
                           class="form-control @error('date') is-invalid @enderror"
                           value="{{ $simCard->registration_date }}" required>
                </div>
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="tariff_id" class="col-sm-2 col-form-label">Выбранный тарифный план</label>
                <div class="col-sm-10">
                    <select name="tariff_id" id="tariff_id" class="form-control" required>
                        @foreach ($tariffs as $tariff)
                            <option
                                value="{{ $tariff->id }}" {{ $simCard->tariff_id == $tariff->id ? 'selected' : '' }}>{{ $tariff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('sim-cards.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
