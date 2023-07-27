@extends('layouts.layout')

@section('main_content')
    <h2>Редактировать тарифный план</h2>

    <div class="container my-4">
        <form action="{{ route('tariffs.update', $tariff) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Название ТП</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ $tariff->name }}" required>
                </div>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="available_minutes" class="col-sm-2 col-form-label">Количество доступных минут</label>
                <div class="col-sm-10">
                    <input type="number" name="available_minutes" id="available_minutes"
                           class="form-control @error('available_minutes') is-invalid @enderror"
                           value="{{ $tariff->available_minutes }}" required>
                </div>
                @error('available_minutes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="available_sms" class="col-sm-2 col-form-label">Количество SMS</label>
                <div class="col-sm-10">
                    <input type="number" name="available_sms" id="available_sms"
                           class="form-control @error('available_sms') is-invalid @enderror"
                           value="{{ $tariff->available_sms }}" required>
                </div>
                @error('available_sms')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="cost" class="col-sm-2 col-form-label">Стоимость</label>
                <div class="col-sm-10">
                    <input type="number" name="cost" id="cost" class="form-control @error('cost') is-invalid @enderror"
                           value="{{ $tariff->cost }}" required>
                </div>
                @error('cost')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    <a href="{{ route('tariffs.index') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </div>
        </form>
    </div>
@endsection
