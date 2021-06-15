@extends('layout')

@section('content')

<a href="{{ route('dokter.create') }}">Dokter</a>

<table style="margin-left:auto;margin-right:auto">
    <thead style="text-align: left">
        <th>ID</th>
        <th>Id_pasien</th>
        <th>Id_dokter</th>
    </thead>    
    <tbody>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>1</td>
    </tr> 
    <tr>
        <td>2</td>
        <td>1</td>
        <td>1</td>
    </tr> 

    </tbody>
</table>


@stop