@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Student</h1>
    </div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/crud" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required autofocus value="{{ old('nim') }}">
            @error('nim')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        <div class="mb-3">
          <label for="nama" class="form-label">nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
          @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly required>
          @error('slug')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="angkatan" class="form-label">angkatan</label>
            <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" required autofocus value="{{ old('angkatan') }}">
            @error('angkatan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>
</div>
<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function(){
        fetch('/dashboard/crud/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection