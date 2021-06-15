@extends('layout')

@section('content')

<a href="{{ route('user.create') }}">User</a>

<table style="margin-left:auto;margin-right:auto">
    <thead style="text-align: left">
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
    </thead>    
    <tbody>
    <tr>
        <td>1</td>
        <td>Admin</td>
        <td>admin</td>
        <td>admin</td>
    </tr> 
    </tbody>
</table>


@stop