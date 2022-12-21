@extends('master.main')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="row text-center mb-3">
            <h3>Post List</h3>
        </div>
        <div class="col-7 offset-2">
            <div class="row">
                <form action="{{ route('admin#postCreate') }}" class="form-control" method="POST">
                    @csrf
                    <div class="row p-2">
                        <label for="" class="col-3">Title</label>
                        <input type="text" name="title" id="" class="form-control col-12 me-3" required>
                        @error('title')
                            <small class="text-danger col-12 offset-3">{{ $message }}</small>
                        @enderror
                        <label for="" class="col-3">description</label>
                        <input type="text" name="description" id="" class="form-control col-12 me-3" required>
                        @error('description')
                            <small class="text-danger col-12 offset-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row me-2 mt-2">
                        <button type="submit" class="btn btn-success col-2 offset-10">Create</button>
                    </div>
                </form>
            </div>
            <div class="row mt-5">
                @if (session('deleteSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{session('deleteSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
            </div>
            <div >
                @if (isset($post))
                <div class="row">
                    <table class="table table-striped rounded mt-5 table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>title</th>
                                <th>description</th>
                                <th>userId</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $l)
                            <tr>
                                <td>{{ $l->post_id }}</td>
                                <td>{{ $l->title }}</td>
                                <td>{{ $l->description }}</td>
                                <td>{{ $l->user_id }}</td>
                                <td>
                                    <a href="{{ route('admin#deletePost',$l->post_id) }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <a href="{{ route('admin#showPost') }}">
                    <button class="mt-5 btn btn-warning">show list</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
