@extends('backend.app')

@section('content')
<h1>Edit Kartu Tanda Penduduk : {{ $resident->nama }} - NIK : {{ $resident->nik }}</h1>

    <a type="button" class="btn btn-danger" href="{{ route('residents.index') }}">Back</a>
    <div>
        @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach
    </div>
    <form action="{{ route('residents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="" value="{{ $resident->id }}">
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama</label>
            <input name="nama" type="text" class="form-control" id="inputEmail4" placeholder="type name"  required value="{{ $resident->nama }}">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Alamat</label>
          <input name="alamat" type="text" class="form-control" id="inputAddress" placeholder="Jl Raya...."  required value="{{ $resident->alamat }}">
        </div>
        <div class="form-group">
            <label for="inputAddress">DOB</label>
            <input name="DOB" type="text" class="form-control" id="inputAddress" placeholder="DOB"  required value="{{ $resident->DOB }}">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="inputAddress2" placeholder="+62" value="{{ $resident->telepon }}">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="inputAddress2" placeholder="Pekerjaan"  required value="{{ $resident->pekerjaan }}">
        </div>

        <div class="form-row">
          
          <div class="form-group col-md-4">
            <label for="inputState">Jenis Kel</label>
            <select id="inputState" class="form-control" name="gender" required>
              <option selected>Choose...</option>
              <option value="l"  @if ($resident->gender === 'l') selected @endif>Laki-laki</option>
              <option value="p" @if ($resident->gender === 'p') selected @endif>Perempuan</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="status" required>
              <option selected value="">Choose...</option>
              <option value="kawin" @if ($resident->status === 'kawin') selected @endif>Kawin</option>
              <option value="belum" @if ($resident->status === 'belum') selected @endif>Belum Kawin</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Agama</label>
            <select id="inputState" class="form-control" name="agama" required>
              <option value="">Choose...</option>
              <option value="islam" @if ($resident->agama === 'islam') selected @endif>Islam</option>
              <option value="kristen" @if ($resident->agama === 'kristen') selected @endif>Kristen</option>
              <option value="katolik" @if ($resident->agama === 'katolik') selected @endif>Katolik</option>
              <option value="hindu" @if ($resident->agama === 'hindu') selected @endif>Hindu</option>
              <option value="budha" @if ($resident->agama === 'budha') selected @endif>Budha</option>
            </select>
          </div>
        </div>
        <div class="custom-file">
            <input name="foto_file" type="file" class="custom-file-input" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choose Photo...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>    
    
@endsection