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
            <th scope="col">
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                    Add course
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr id="{{ $course['id'] }}">
                <th scope="row">{{ $course['id'] }}</th>
                <td>{{ $course['name'] }}</td>
                <td>
                    <a href="#" onclick="del({{ $course['id'].','.$student_id }})" class="badge badge-danger">Delete</a>
                </td>.
            </tr>
        @endforeach

        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog-centered-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Courses</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-dark">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( \App\Course::all() as $cour)
                            <tr id="modal{{ $cour['id'] }}">
                                <th scope="row">{{ $cour['id'] }}</th>
                                <td>{{ $cour['name'] }}</td>
                                <td>
                                    <a href="#" onclick="add({{ $cour['id'].','.$student_id }})" class="badge badge-info">Add</a>

                                </td>.
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
                </div>
            </div>
        </div>
    </div>

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

        function add(course_id, student_id) {

            $.ajax({
                type:'POST',
                url:'/addscourse/' + course_id + '/' + student_id,
                data:{_token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                    if(msg.msg) {
                        document.getElementById('modal' + course_id).innerHTML = '';
                    }
                },
                error: function () {
                    alert('This course is already enrolled for this student')
                }

            })

        }
    </script>
@endsection
