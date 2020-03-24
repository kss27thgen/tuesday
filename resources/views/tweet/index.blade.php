@extends('layouts.app')

@section('content')

    <form action="{{ route('tweets.store') }}" method="POST" class="d-flex justify-content-between" enctype="multipart/form-data">
        @csrf
        <div class="form-group w-100">
            <input type="text" class="form-control" name="text" placeholder="say something.." autofocus>
        </div>
        <div class="form-group">
            <label for="image" class="btn btn-outline-success">FILE</label>
            <input type="file" name="image" id="image" hidden>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($tweets as $tweet)
            <li class="list-group-item">
                <div class="d-flex">
                    <p>{{ $tweet->user->name }}</p>
                    <p class="ml-3">({{ $tweet->created_at->diffForHumans() }})</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="display-4">{{ $tweet->text }}</p>
                        @if ($tweet->image)
                            <p>
                                <a href="{{ $tweet->image }}" target="_blank">
                                    <img width="200" src="{{ $tweet->image }}">
                                </a>
                            </p>
                        @endif
                    </div>
                    <a href="{{ route('tweets.destroy', $tweet) }}" class="btn btn-outline-danger align-self-start">DEL</a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection