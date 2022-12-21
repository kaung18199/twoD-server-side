@extends('master.main')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col-8 offset-2">
            <div class="row text-center">
                <h3>Order List</h3>
            </div>
            <div class="row mt-2">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
            </div>
            <div class="row">
                <table class="table table-striped rounded mt-5 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order Code</th>
                            <th>Phone</th>
                            <th>total Amount</th>
                            <th>state</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($order as $o)
                        <tr class="mt-3">
                            <td>{{ $o->name}}</td>
                            <td>
                                <a href="{{ route('admin#orderCode',$o->order_code) }}">{{ $o->order_code }}</a>
                            </td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->total }}</td>
                            <form action="{{ route('admin#state',$o->order_id) }}" method="post">
                                @csrf
                                <td>
                                    @if ($o->state == 0)
                                        <select class="form-control" name="state">
                                            <option value="0" selected class="text-warning">Waiting</option>
                                            <option value="1" class=" text-success">Confirm</option>
                                            <option value="2" class="text-danger">Reject</option>
                                        </select>
                                    @endif
                                    @if($o->state == 1)
                                    <select class="form-control" name="state">
                                        <option value="0"  class="text-warning">Waiting</option>
                                        <option value="1" selected class=" text-success">Confirm</option>
                                        <option value="2" class="text-danger">Reject</option>
                                    </select>
                                    @endif
                                    @if($o->state == 2)
                                    <select class="form-control" name="state">
                                        <option value="0"  class="text-warning">Waiting</option>
                                        <option value="1"  class=" text-success">Confirm</option>
                                        <option value="2" selected class="text-danger">Reject</option>
                                    </select>
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    <button class="btn btn-secondary">Change</button>
                                </td>
                            </form>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <h5>For Detail</h5>
                <hr>
            </div>
            @if (isset($orderD))
            <div class="row mt-2 text-center">
                @foreach ($orderD as $d)
                <div class="col-6">
                    <div class="card  shadow rounded border border-1 me-2 mb-2" style="width: 100%" >
                        <div class="card-header">
                            {{ $d->order_code }}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">name- {{ $d->name }}</li>
                            <li class="list-group-item">type- {{ $d->type }}</li>
                            <li class="list-group-item">number- {{ $d->number }}</li>
                            <li class="list-group-item">amount- {{ $d->amount }}</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h6 class="text-secondary">Click the order_code</h6>
            @endif
        </div>
    </div>
</div>

@endsection
