@extends('layout')

@section('title', 'Import Pasien')

@section('content')

<form action="{{ route('pasien-294.store') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <label>Unggah File Excel</label>
    <input type="file" name="file_excel"/>
    <button type="submit">Import</button>
</form>

@stop
