@extends('layouts.app')

@section('content')
<div class="hr mb-3"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-color">
                <div class="card-header header-color">List of Categories</div>
                <div class="card-body">
                    @foreach ($countries as $category)
                    <div class="d-flex flex-row justify-content-between grey-line mb-3">
                        <div>
                            {{$category->name}}<br>
                            Season Time Starts: {{$category->s_time}}<br>

                        </div>
                        @if (Auth::user()->role > 9)
                        <div class="d-flex flex-row align-items-end mb-2">
                            <a class="btn btn-outline-success ms-3" href="{{route('category.edit',$category)}}">EDIT</a><br>
                            <form method="POST" action="{{route('category.destroy', $category)}}">
                                @csrf
                                <button class="btn btn-outline-secondary ms-3" type="submit">DELETE</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
