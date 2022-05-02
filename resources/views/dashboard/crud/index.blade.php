@extends('layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  <h4>Data Crud</h4>
  @if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div> 
@endif
<div class="table-responsive col-lg-8">
  <a href="/dashboard/crud/create" class="btn btn-primary mb-3">Create New Student</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nim</th>
        <th scope="col">nama</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($ilkoms as $crud)     
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $crud->nim }}</td>
        <td>{{ $crud->nama }}</td>
        <td>
          <a href="/dashboard/crud/{{ $crud->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/crud/{{ $crud->slug }}" method="post" class="d-inline" onsubmit="return confirm('Are You Sure?')">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- pagination --}}

{{-- <div class="d-flex justify-content-end col-lg-8">
  {{ $posts->links() }}
</div> --}}
@endsection