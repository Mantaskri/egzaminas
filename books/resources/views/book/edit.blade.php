@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$book->name}}</div>
                <div class="card-body">
                    <form class="d-flex flex-column align-items-center" method="post" action="{{route('book.update',$book)}}" enctype="multipart/form-data">
                        <div class="col-md-4 ms-3 mb-3">
                            Name: <input class="ms-3 mt-3" type="text" name="book_name" value="{{$book->name}}"><br>
                            Price: <input class="ms-3 mt-3" type="text" name="book_price" value="{{$book->price}}"><br>
                            Reservation time: <input class="ms-3 mt-3" type="text" name="book_reservation_time" value="{{$book->reservation_time}}"><br>
                            <select class="mt-3" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $book->category_id) selected @endif>
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            @if($book->photo)
                            <div class="image-box mt-3 me-3">
                                <img src="{{$book->photo}}">
                            </div>
                            @endif
                            <div class="form-group mt-2">
                                <label>Photo of the Book</label>
                                <input class="form-control" type="file" name="book_photo" />
                            </div>
                        </div>
                        @csrf
                        @method('put')
                        <button class="btn btn-outline-success mt-3 mb-3" type="submit">Save</button>
                    </form>
                    @if($book->photo)
                    <form class="d-flex flex-column align-items-center" action="{{route('books.delete-picture', $book)}}" method="post">
                        @csrf
                        @method('put')
                        <button class="btn btn-outline-danger mt-4" type="submit">Delete picture</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
