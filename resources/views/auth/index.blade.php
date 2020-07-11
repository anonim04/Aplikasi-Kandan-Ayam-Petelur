@extends('layouts.app')
@section('content')
<div class="field is-grouped is-grouped-centered">
    <h1 class="title has-text-weight-bold">User</h1>
</div>
<div class="buttons is-right">
    <a class="button is-info" href="{{route('register')}}">
        <span class="icon">
            <i class="fas fa-plus"></i>
        </span>
    </a>
  </div>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th><abbr title="Number">No</abbr></th>
            <th><abbr title="Role">Role</abbr></th>
            <th><abbr title="Name">Nama</abbr></th>
            <th><abbr title="Email">Email</abbr></th>
            <th colspan="2"><abbr title="Keterangan">Keterangan</abbr></th>
        </tr>
    </thead>
    <tbody>
        @php
        $i=1
        @endphp
        @foreach ($users as $user)
        <tr>
            <th>{{$i++}}</th>
            <td>{{$user->role}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><a class="button is-danger">Delete</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
