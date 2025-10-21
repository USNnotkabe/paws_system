<x-layout>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <h2>register your account</h2>
        <label for="name"> Name:</label>
        <input type="name" name="name" required value="{{ old('name') }}">

        <label for="email"> Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password"> Password:</label>
        <input type="password" name="password" required>


        <label for="password_confirmation"> Password:</label>
        <input type="password" name="password_confirmation" required>


        <button type="submit">register</button>
        @if ($errors->any())
        <ul @foreach ($errors->all() as $error) <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>

</x-layout>
