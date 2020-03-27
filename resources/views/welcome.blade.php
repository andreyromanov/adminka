@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Панель управления</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
@endsection
