@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Анектоды</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        {{--                    <a href="{{ url('/add') }}">Добавить</a>--}}
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th width="150px">Автор</th>
                                        <th class="text-center">Анектод</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jokes as $joke)
                                        <tr>
                                            <td>{{$joke->author[0]['name']}}</td>
                                            <td class="text-center">{{$joke->joke}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
