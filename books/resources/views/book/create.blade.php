@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Create new Book</div>
                <div class="card-body">
                    <form class="d-flex flex-column align-items-center" method="post" action="{{route('book.store')}}" enctype="multipart/form-data">
                        Name: <input type="text" name="book_name">
                        Price: <input type="text" name="book_price">
                        Reservation Time: <input type="text" name="book_reservation_time">
                        <select class="mt-3" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}} {{$category->r_time}}</option>
                            @endforeach
                        </select>
                        <div class="form-group mt-2">
                            <label>Photo of the Book</label>
                            <input class="form-control" type="file" name="book_photo" />
                        </div>
                        @csrf
                        @method('post')
                        <button class="btn btn-outline-success mt-3" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
