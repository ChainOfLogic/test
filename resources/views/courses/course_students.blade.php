@extends('layouts.header')
@section('content')
    <span class="badge badge-primary">All Courses</span>
    <span class="badge badge-warning">{{ \App\Course::find($course_id)->name }}</span>
    <!-- Button trigger modal -->


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
            <th scope="col">
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                    Add student
                </button>
            </th>

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
                <a href="#" onclick="del({{ $course_id.','.$student['id'] }})" class="badge badge-danger">Delete</a>

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
                    <h5 class="modal-title" id="exampleModalLabel">Students</h5>
                    </button>
                </div>
                <div class="modal-body">
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
                        @foreach( \App\Student::all() as $stud)
                            <tr id="modal{{ $stud['id'] }}">
                                <th scope="row">{{ $stud['id'] }}</th>
                                <td>{{ $stud['first_name'] }}</td>
                                <td>{{ $stud['second_name'] }}</td>
                                <td>{{ $stud['birth_date'] }}</td>
                                <td>{{ $stud['phone_number'] }}</td>
                                <td>{{ $stud['address'] }}</td>
                                <td>{{ $stud['email'] }}</td>
                                <td>
                                    <a href="#" onclick="add({{ $course_id.','.$stud['id'] }})" class="badge badge-info">Add</a>

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
                    document.getElementById(student_id).innerHTML = '';
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
                        document.getElementById('modal' + student_id).innerHTML = '';
                    }
                },
                error: function () {
                    alert('This student is already enrolled for this course')
                }

            })

        }
    </script>
@endsection
