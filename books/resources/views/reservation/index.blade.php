@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">List of Reservations</div>
                <div class="card-body">
                    @foreach ($reservations as $reservation)
                    <div class="d-flex flex-row justify-content-between grey-line mb-3">
                        <div>
                            <div class="mb-3">
                                <b>Reservation for: {{$reservation->client->name}}</b><br>
                                {{$reservation->count}}x {{$reservation->book->name}}<br>
                                @if( $reservation->status == 3)
                                    <div class="btn btn-success disabled">
                                        Approved
                                    </div>
                                @endif
                            </div>
                            @if (Auth::user()->role > 9)
                            <form method="POST" action="{{route('reservation.destroy', $reservation)}}">
                                @csrf
                                <button class="btn btn-outline-dark mt-3 mb-1" type="submit">Delete Reservation</button>
                            </form>
                            @endif
                        </div>
                        @if (Auth::user()->role > 9)
                        <div>
                            <form class="d-flex flex-row justify-content-end mb-2" action="{{route('reservation.status', $reservation)}}" method="post">
                                <div>
                                    <label>Status:</label>
                                    <select class="form-select" name="status">
                                        @foreach($statuses as $key => $status)
                                        <option value="{{$key}}" @if($key==$reservation->status) selected @endif>{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success m-4">Set status</button>
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
