@extends('layouts.header')

@section('content')
    <span class="badge badge-primary">All Courses</span>
    <table class="table table-hover table-dark">
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Course name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row">{{ $course['id'] }}</th>
                <td>
                    <input type="text" class="form-control course{{ $course['id'] }}" value="{{ $course['name'] }}" >
                </td>

                <td>
                    <a href="\courses\{{ $course['id'] }}" class="badge badge-info" >Show students</a>
                    <a  href="#" class="badge badge-danger" onclick="call('deleteCourse', {{ $course['id'] }})">Delete</a>
                    <a  href="#" class="badge badge-warning" onclick="call('modifyCourse', {{ $course['id'] }})">Modify</a>
                </td>.
            </tr>

         @endforeach
            <tr>
            <th scope="row"></th>
            <td>
                <input type="text" class="form-control courseadd" placeholder="Course name" >
            </td>
            <td>
                <a href="#" class="badge badge-success" onclick="call('addCourse', 'add')">Add</a>
            </td>
        </tr>
        </tbody>
    </table>

    <script>
        function call(query, argument) {
            // get elements of the class
            var data = Object.values(document.getElementsByClassName('form-control course' + argument)).map(x => x.value)
            $.ajax({
                type:'POST',
                url:'/coursesRouter',
                data: {
                    "_method": 'POST',
                    "_token": "{{ csrf_token() }}",
                    "func": query,
                    "arg": argument,
                    "data": data,
                },
                success: function( msg ) {
                    location.reload()
                }
            })

        }
    </script>

@endsection
