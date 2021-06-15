@extends('layout')

@section('content')

<a href="{{ route('dokter.create') }}">Dokter</a>

<table style="margin-left:auto;margin-right:auto">
    <thead style="text-align: left">
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
    </thead>    
    <tbody>
    <tr>
        <td>1</td>
        <td>Arif</td>
        <td>Sidoarjo</td>
    </tr> 
    <tr>
        <td>2</td>
        <td>Ade</td>
        <td>Surabaya</td>
    </tr> 

    </tbody>
</table>


@stop