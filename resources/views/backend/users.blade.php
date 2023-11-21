@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>User List</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>{{$value->name}}</p>
                        </td>
                        <td>{{$value->email}}</td>     
                        @if($value->utype == "Admin")                   
                        <td><span class="status pending">{{$value->utype}}</span></td>
                        @else
                        <td><span class="status completed">{{$value->utype}}</span></td>
                        @endif
                        <td>{{$value->creaded_at}}</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach{{-- 
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>example@gmail.com</td>                        
                        <td><span class="status completed">Completed</span></td>
                        <td>01-10-2021</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>example@gmail.com</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>01-10-2021</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>example@gmail.com</td>
                        <td><span class="status process">Process</span></td>
                        <td>01-10-2021</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>example@gmail.com</td>
                        <td><span class="status pending">Pending</span></td>
                        <td>01-10-2021</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{asset('backend/img/people.png')}}">
                            <p>John Doe</p>
                        </td>
                        <td>example@gmail.com</td>                        
                        <td><span class="status completed">Completed</span></td>
                        <td>01-10-2021</td>
                        
                        <td>
                            <button class="status completed" style="border:none;cursor:pointer">Edit</button>
                            <button class="status pending" style="border:none;cursor:pointer">Delete</button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
