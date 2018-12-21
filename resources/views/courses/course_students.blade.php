@extends('layouts.header')
@section('content')
    <span class="badge badge-primary">All Courses</span>
    <span class="badge badge-warning">{{ \App\Course::find($course_id)->name }}</span>
    <table class="table table-hover table-dark">
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First_name</th>
            <th scope="col">Second_name</th>
            <th scope="col">Birth_date</th>
            <th scope="col">Phone_number</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr id="{{ $student['id'] }}">
            <th scope="row">{{ $student['id'] }}</th>
            <td>{{ $student['first_name'] }}</td>
            <td>{{ $student['second_name'] }}</td>
            <td>{{ $student['birth_date'] }}</td>
            <td>{{ $student['phone_number'] }}</td>
            <td>{{ $student['address'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>
                <a onclick="del({{ $course_id.','.$student['id'] }})" class="badge badge-danger">Delete</a>

            </td>.
        </tr>
        @endforeach

        </tbody>
    </table>
    <script>
        function del(course_id, student_id) {

            $.ajax({
                type:'POST',
                url:'/delscourse/' + course_id + '/' + student_id,
                data:{_token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    document.getElementById(student_id).innerHTML = '';
                }
            })

        }
    </script>
@endsection
