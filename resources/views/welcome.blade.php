@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Панель управления</div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 border">
                <h5>Товары</h5>
                {{$products}}
            </div>
            <div class="col-4 border">
                <h5>Категории</h5>
                {{$categories}}
            </div>
            <div class="col-4 border">
                <h5>Источники</h5>
                MEBTEX - {{$mebtex}}
            </div>
        </div>
    </div>
</div>
@endsection
