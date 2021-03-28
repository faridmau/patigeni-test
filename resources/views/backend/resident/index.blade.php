@extends('backend.app')

@section('content')

<div class="container table-responsive py-5"> 
    <a type="button" class="btn btn-primary" href="{{ route('residents.create') }}">Add</a>
    
    <a type="button" class="btn btn-primary" href="{{ route('residents.export') }}" >Export</a>
    <form action="{{ route('residents.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button class="btn btn-primary" type="submit">Import</button>
    </form>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">nik</th>
            <th scope="col">nama</th>
            <th scope="col">alamat</th>
            <th scope="col">DOB</th>
            <th scope="col">telepon</th>
            <th scope="col">pekerjaan</th>
            <th scope="col">gender</th>
            <th scope="col">agama</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($residents as $resident)
          <tr>
            <td scope="col">{{ $resident->id }}</td>
            <td scope="col">{{ $resident->nik }}</td>
            <td scope="col">{{ $resident->nama }}</td>
            <td scope="col">{{ $resident->alamat }}</td>
            <td scope="col">{{ $resident->DOB }}</td>
            <td scope="col">{{ $resident->telepon }}</td>
            <td scope="col">{{ $resident->pekerjaan }}</td>
            <td scope="col">{{ $resident->gender }}</td>
            <td scope="col">{{ $resident->agama }}</td>
            <td scope="col">{{ $resident->status }}</td>
            <td scope="col">
                <a type="button" class="btn btn-info btn-sm" href="{{ route('residents.edit', $resident->id) }}">Edit</a>
                <form action="{{ route('residents.destroy', $resident->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                
            </td>
          </tr>
          @endforeach
        
        
      </tbody>
    </table>
    {{ $residents->links() }}
    <script>
        function exportTasks(_this) {
            let _url = $(_this).data('href');
            window.location.href = _url;
        }
    </script>
@endsection
