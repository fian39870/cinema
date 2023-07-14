@extends('components.admin.main')
@section('title')
Saldo
@endsection
@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Saldo</h1>
            
        </div>

        <div class="section-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-auto ml-auto">
                                        <a href="{{route('balance.create')}}" class="btn btn-primary">Create</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pengguna</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($balances as $balance)
                                    <tr>
                                        <td>{{$balance->id}}</td>
                                        <td>{{$balance->user->name}}</td>
                                        <td>{{$balance->user->email}}</td>
                                        <td>{{$balance->amount}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('balance.edit', ['id'=>$balance->id])}}" class="btn btn-success mr-2">Edit</a>
                                                <form method="POST" action="{{ route('balance.delete', ['id' => $balance->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection