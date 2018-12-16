@extends('layouts.header')

@section('content')
    <span class="badge badge-primary">All Students</span>
    <table class="table table-hover table-dark">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>s</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <a href="#" class="badge badge-info">Show courses</a>
                <a href="#" class="badge badge-danger">Delete</a>
                <a href="#" class="badge badge-warning">Modify</a>
                <a href="#" class="badge badge-success">Add</a>
            </td>.
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>
@endsection
