<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Pets</title>
    <style>
    .pet-row {
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .pet-row:hover {
        background-color: #f0f0f0;
    }
    </style>
</head>

<body>
    <div class="logo">
        <h1>PAWS</h1>
    </div>
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif
    <h1>Available Pets for Adoption</h1>
    <div style="margin-bottom: 15px;">
        <a href="{{ route('pets.create') }}">
            <button type="button">+ Add New Pet</button>
        </a>
    </div>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Pet Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pets as $pet)
            <tr class="pet-row">
                <td><a href="{{ route('pets.show', $pet->id) }}"
                        style="text-decoration: none; color: inherit; display: block;">{{ $pet->pet_name }}</a></td>
                <td><a href="{{ route('pets.show', $pet->id) }}"
                        style="text-decoration: none; color: inherit; display: block;">{{ ucfirst($pet->category) }}</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align: center; padding: 20px;">
                    No pets available at the moment.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
