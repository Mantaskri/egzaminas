@extends('layouts.app')

@section('content')
<div class="hr mb-3"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header header-color">List of Books</div>
                <div class="card-body">
                    <div class="droppy dropend mb-3">
                        <div class="btn btn btn-secondary btn-sm dropdown-toggle ">
                            Sort by:
                        </div>
                        <div class="drop-pop">
                            <a class="btn btn-secondary btn-sm ms-1" href="{{route('book.index', ['sort' => 'price-asc'])}}" role="button">Price 0-99</a>
                            <a class="btn btn-secondary btn-sm" href="{{route('book.index', ['sort' => 'price-desc'])}}" role="button">Price 99-0</a>
                        </div>
                    </div>
                    <form class="d-flex flex-row justify-content-start mb-2" action="{{route('book.index')}}" method="get">
                        <div class="col-4 mb-3">
                            <label>Filter by category:</label>
                            <select class="form-select" name="category_id">
                                <option value="0" @if($filter==0) selected @endif>No filter</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($filter==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success m-4">Filter</button>
                    </form>
                    @foreach ($books as $book)
                    <div class="d-flex justify-content-start grey-line mb-3">

                        @if($book->photo)
                        <div class="image-box mb-3 me-3">
                            <img src="{{$book->photo}}">
                        </div>
                        @endif

                        <div class="d-flex flex-column justify-content-between mb-3">
                            <div>
                                <b>{{$book->name}}</b><br>
                                Pirce: {{$book->price}}€<br>
                                Reservation Time: {{$book->reservation_time}} <br>
                                Category: {{$book->bookCategory->name}} <br>
                            </div>
                            <div class="mt-3">
                                <form method="post" action="{{route('reservation.add')}}">
                                    @csrf
                                    @method('post')
                                    <input class="reservation-count" type="number" name="books_count">
                                    <input type="hidden" value="{{$book->id}}" name="book_id">
                                    <button class="btn btn-outline-success me-3" type="submit">Reservation</button>
                                </form>
                            </div>
                            @if (Auth::user()->role > 9)
                            <div class="d-flex flex-row justify-content-start mt-1">
                                <a class="btn btn-outline-success me-1" href="{{route('book.edit',$book)}}">EDIT</a><br>
                                <form method="POST" action="{{route('book.destroy', $book)}}">
                                    @csrf
                                    <button class="btn btn-outline-secondary" type="submit">DELETE</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
