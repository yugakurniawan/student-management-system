@can('admin-student')

@endcan

@extends('layouts.argon-index')

@section('container')

<div class="row">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white my-3">Data Siswa</h3>
                <a href="{{ url('/') }}/reports/exportexcel" class="btn btn-secondary">Export Excel</a>
                <a href="{{ url('/') }}/reports/exportpdf" class="btn btn-secondary">Export PDF</a>
                @if (session('status'))
                <div class="alert alert-success" style="margin-top:20px">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
