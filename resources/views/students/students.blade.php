@extends('layouts.header')

@section('content')
    <span class="badge badge-primary">All Students</span>
    <table class="table table-hover table-dark" id ='students'>
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First name</th>
            <th scope="col">Second name</th>
            <th scope="col">Birth_date</th>
            <th scope="col">Phone_number</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr id="tr{{ $student['id'] }}">
                <th scope="row">{{ $student['id'] }}</th>
                <td>
                    <input type="text" class="form-control student{{ $student['id'] }}" value="{{ $student['first_name'] }}" >
                </td>

                <td>
                    <input type="text" class="form-control student{{ $student['id'] }}" value="{{ $student['second_name'] }}" >
                </td>

                <td>
                    <input type="date" class="form-control student{{ $student['id'] }}" value="{{ $student['birth_date'] }}" >
                </td>

                <td>
                    <input type="text" class="form-control student{{ $student['id'] }}" value="{{ $student['phone_number'] }}" >
                </td>

                <td>
                    <input type="text" class="form-control student{{ $student['id'] }}" value="{{ $student['address'] }}" >
                </td>

                <td>
                    <input type="text" class="form-control student{{ $student['id'] }}" value="{{ $student['email'] }}" >
                </td>

                <td>
                    <a href="\students\{{ $student['id'] }}" class="badge badge-info" >Show courses</a>
                    <a  class="badge badge-danger" onclick="call('deleteStudent', {{ $student['id'] }})">Delete</a>
                    <a  class="badge badge-warning" onclick="call('modifyStudent', {{ $student['id'] }})">Modify</a>
                </td>.
            </tr>

        @endforeach
        <tr>
            <th scope="row"></th>
            <td>
                <input type="text" class="form-control studentadd" placeholder="first name" />
            </td>

            <td>
                <input type="text" class="form-control studentadd" placeholder="second name" />
            </td>

            <td>
                <input type="date" class="form-control studentadd" placeholder="birth_date" />
            </td>

            <td>
                <input type="text" class="form-control studentadd" placeholder="phone_number" />
            </td>

            <td>
                <input type="text" class="form-control studentadd" placeholder="address" />
            </td>

            <td>
                <input type="email" class="form-control studentadd" placeholder="email" />
            </td>
            <td>
                <a href="#" class="badge badge-success" onclick="call('addStudent', 'add')">Add</a>
            </td>
        </tr>
        </tbody>
    </table>

    <script>
        function call(query, argument) {
            // get elements of the class
            var data = Object.values(document.getElementsByClassName('form-control student' + argument)).map(x => x.value)
            $.ajax({
                type:'POST',
                url:'/studentsRouter',
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
