@extends('layouts.master')

@section('title', 'Danh sách tài khoản')

@section('content')
    <table class='table table-stripped'>
        <thead>
            <tr>
                <th>#</th>
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>type</th>
                <th>chu_tai_khoan_id</th>
            <tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr onclick='window.location.href="/user/{{ $user->id }}"' style='cursor:pointer'>
                    <td><a href='/user/{{ $user->id }}'>{{ $user->id }}</a></td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->chu_tai_khoan_id }}</td>
                <tr>
            @endforeach
        </tbody>
    </table>
@endsection
