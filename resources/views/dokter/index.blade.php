@extends('layout')

@section('content')

<a href="{{ route('dokter.create') }}">Dokter</a>

<table style="border: solid 1px; width: 50%; font-size: 2em">
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