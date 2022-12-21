@extends('master.main')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-7 offset-2">
            <div class="row text-center">
                <h3>User List</h3>
            </div>
            <div class="row">
                <table class="table table-striped rounded mt-5 table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $l)
                        <tr class="mt-3">
                            <td>{{ $l->name }}</td>
                            <td>{{ $l->email }}</td>
                            <td>{{ $l->phone }}</td>
                            <td>{{ $l->address }}</td>
                            <td>
                                @if (Auth::user()->name == $l->name)
                                @else
                                <a href="{{ route('admin#deleteUserList',$l->id) }}" class=" text-decoration-none btn btn-info btn-sm">
                                    <i class="fa-solid fa-trash me-2"></i>Block
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
