<x-layout>


    <form action="{{route('login')}}" method="POST">
        @csrf

        <h2>login into your account</h2>
        <label for="email"> Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password"> Password:</label>
        <input type="password" name="password" required>



        <button type="submit">login</button>

    </form>
</x-layout>
