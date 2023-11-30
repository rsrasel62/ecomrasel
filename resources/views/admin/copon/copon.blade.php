@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Copon list</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Sl</th>
                            <th>Copon code</th>
                            <th>Copon type</th>
                            <th>Amount</th>
                            <th>Validity</th>
                            <th>Action</th>
                        </tr>
                        @foreach($copons as $key => $copon)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $copon->copon_code }}</td>
                            <td>{{ $copon->type }}</td>
                            <td>{{ $copon->amount }}</td>
                            <td><div class="badge badge-success">{{ Carbon\Carbon::now()->diffInDays($copon->validity, false);
                            }} Days left</div></td>
                            <td>
                                <a href="{{ route('copon.delete', $copon->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="{{ route('copon.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Add copon</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Copon code</label>
                            <input type="text" name="copon_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select name="type" type="number" id="" class="form-control">
                                <option value="">--select type--</option>
                                <option value="1">Percentage</option>
                                <option value="2">solid amount</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-control">Discount Amount</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-control">Validity</label>
                            <input type="date" class="form-control" name="validity">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add copon</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
