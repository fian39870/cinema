@extends('components.admin.main')
@section('title')
Tambah Saldo
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Saldo</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                </div>
                            </div>
                            <form method="post" action="{{route('balance.create.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="email">Nama</label>
                                    <select class="form-control" id="name" name="name">
                                        <option value="">Pilih Nama</option>
                                        @foreach($user as $user)
                                        <option value="{{ $user->id }}" data-email="{{ $user->email }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" readonly>
                                </div>

                                <script>
                                    document.getElementById('name').addEventListener('change', function() {
                                        var emailField = document.getElementById('email');
                                        var selectedOption = this.options[this.selectedIndex];
                                        var email = selectedOption.getAttribute('data-email');

                                        if (email) {
                                            emailField.value = email;
                                            emailField.readOnly = true;
                                        } else {
                                            emailField.value = '';
                                            emailField.readOnly = false;
                                        }
                                    });
                                </script>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Saldo</label>
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukkan Saldo">
                                </div>
                                <td>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('balance')}}" class="btn btn-danger">batal</a>

                                </td>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection