@extends('layout')

@section('content')

<a href="{{ route('dokter.create') }}">Dokter</a>

<table style="margin-left:auto;margin-right:auto">
    <thead style="text-align: left">
        <th>ID</th>
        <th>Nama</th>
        <th>Jabatan</th>
    </thead>    
    <tbody>
    <tr>
        <td>1</td>
        <td>Zam</td>
        <td>Dokter Umum</td>
    </tr> 

    </tbody>
</table>


@stop