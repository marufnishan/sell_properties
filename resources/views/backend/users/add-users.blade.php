<!-- create.blade.php -->

@extends('backend.layouts.dashboard')

@section('content')
<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <!-- User Create Form -->
            <form id="createUserForm" action="{{ route('user.store') }}" method="post">
                @csrf

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="userType">User Type:</label>
                <select id="userType" name="user_type" required>
                    <option value="Admin">Admin</option>
                    <option selected value="User">User</option>
                </select>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>


                <button id="submit-button" type="submit">Create</button>
            </form>
        </div>
    </div>
</main>
<!-- MAIN -->
@endsection
