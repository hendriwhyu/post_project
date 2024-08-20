@extends('layouts.author')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Welcome Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, {{ Auth::user()->name }}</h6>
                </div>
                <div class="card-body">
                    <p>Di Halaman Author, <b>{{ Auth::user()->name }}</b> Anda dapat mengelola data-data post yang ada di sistem kami.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
