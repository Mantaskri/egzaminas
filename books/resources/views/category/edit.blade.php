@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Edit {{ $category->name }} information</div>
                    <div class="card-body">
                        <form class="d-flex flex-column align-items-center" method="POST"
                            action="{{ route('category.update', $category) }}">
                            <div class="col-md-4 ms-3 mb-3">
                                Name: <input type="text" name="category_name" value="{{ $category->name }}"><br>
                            </div>
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success mt-3 mb-3" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
