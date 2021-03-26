@extends('backend.app')

@section('content')
<h1>Add Kartu Tanda Penduduk</h1>

    <a type="button" class="btn btn-danger" href="{{ route('residents.index') }}">Back</a>
    <div>
        @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach
    </div>
    <form action="{{ route('residents.store') }}" method="post" enctype="multipart/form-data">
        @csrf   
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama</label>
            <input name="nama" type="text" class="form-control" id="inputEmail4" placeholder="type name"  required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Alamat</label>
          <input name="alamat" type="text" class="form-control" id="inputAddress" placeholder="Jl Raya...."  required>
        </div>
        <div class="form-group">
            <label for="inputAddress">DOB</label>
            <input name="DOB" type="text" class="form-control" id="inputAddress" placeholder="DOB"  required>
        </div>
        <div class="form-group">
            <label for="inputAddress2">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="inputAddress2" placeholder="+62">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="inputAddress2" placeholder="Pekerjaan"  required>
        </div>

        <div class="form-row">
          
          <div class="form-group col-md-4">
            <label for="inputState">Jenis Kel</label>
            <select id="inputState" class="form-control" name="gender" required value="">
              <option selected>Choose...</option>
              <option value="l">Laki-laki</option>
              <option value="p">Perempuan</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="status" required>
              <option selected value="">Choose...</option>
              <option value="kawin">Kawin</option>
              <option value="belum">Belum Kawin</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Agama</label>
            <select id="inputState" class="form-control" name="agama" required>
              <option selected value="">Choose...</option>
              <option value="islam">Islam</option>
              <option value="kristen">Kristen</option>
              <option value="katolik">Katolik</option>
              <option value="hindu">Hindu</option>
              <option value="budha">Budha</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
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