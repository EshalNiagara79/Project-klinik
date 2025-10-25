@extends('layouts.app', ['title' => 'Edit Pasien'])

@section('content')
<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-8">
<div class = "card">
<div class = "card-header">Edit Pasien</div>

                <div class = "card-body">
                    @if ($errors->any())
                        <div class = "alert alert-danger">
                            <strong>Terjadi kesalahan: </strong>
                            <ul class = "mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action = "{{ route('pasien.update', $pasien->id) }}" method = "POST">
                        @csrf
                        @method('PUT')

                        <div   class            = "mb-3">
                        <label for              = "no_pasien" class  = "form-label">Nomor Pasien</label>
                        <input type             = "text" name = "no_pasien" id = "no_pasien"
                               class            = "form-control @error('no') is-invalid @enderror"
                               value            = "{{ old('no_pasien', $pasien->no_pasien) }}">
                        @error('no') <div class = "invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div   class              = "mb-3">
                        <label for                = "nama" class = "form-label">Nama</label>
                        <input type               = "text" name  = "nama" id = "nama"
                               class              = "form-control @error('nama') is-invalid @enderror"
                               value              = "{{ old('nama', $pasien->nama) }}">
                        @error('name') <div class = "invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div   class             = "mb-3">
                        <label for               = "umur" class   = "form-label">Usia</label>
                        <input type              = "number" name = "umur" id = "umur" min = "0"
                               class             = "form-control @error('umur') is-invalid @enderror"
                               value             = "{{ old('umur', $pasien->umur) }}">
                        @error('umur') <div class = "invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div    class = "mb-3">
                        <label  for   = "jenis_kelamin" class = "form-label">Jenis Kelamin</label>
                        <select name  = "jenis_kelamin" id    = "jenis_kelamin"
                                class = "form-select @error('jenis_kelamin') is-invalid @enderror">

                        <option value = "Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value = "Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class = "invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div      class                 = "mb-3">
                        <label    for                   = "alamat" class = "form-label">Alamat</label>
                        <textarea name                  = "alamat" id    = "alamat" rows = "3"
                                  class                 = "form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $pasien->alamat) }}</textarea>
                        @error   ('alamat') <div class = "invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
