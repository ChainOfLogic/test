@extends('layouts.header')

@section('content')
    <span class="badge badge-primary">All Students</span>
    <span class="badge badge-warning">{{ \App\Student::find($student_id)->first_name }}</span>
    <table class="table table-hover table-dark">
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr id="{{ $course['id'] }}">
                <th scope="row">{{ $course['id'] }}</th>
                <td>{{ $course['name'] }}</td>
                <td>
                    <a onclick="del({{ $course['id'].','.$student_id }})" class="badge badge-danger">Delete</a>
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
                    document.getElementById(course_id).innerHTML = '';
               }
           })

        }
    </script>
@endsection
