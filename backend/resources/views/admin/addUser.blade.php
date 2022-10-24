@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить пользователя</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <form enctype="multipart/form-data" action="{{route('storeUser')}}" method="POST" id="client-form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Имя</label>
                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
                <label for="username">Никнейм</label>
                <input id="username" name="username" class="form-control @error('username') is-invalid @enderror">
                @error('username')
                <span id="username-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </form>
        <div class="card-footer">
            <div class="row">
                <button class="btn btn-success btn-sm" form="client-form">
                    <i class="fa-solid fa-save"></i>
                    Сохранить
                </button>
            </div>
        </div>
    </div>
@endsection

