<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
</head>

<body>
    <div>
        <a href="{{ route('petlisting.index') }}">
            <button type="button">View Pet Listings</button>
        </a>
    </div>

    <h1>Pets Management</h1>

    @if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
    @endif

    <div style="margin-bottom: 15px;">
        <a href="{{ route('pets.create') }}">
            <button type="button">Add New Pet</button>
        </a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet Name</th>
                <th>Category</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Gender</th>
                <th>Color</th>
                <th>Description</th>
                <th>Price</th>
                <th>Listing Type</th>
                <th>Status</th>
                <th>Allergies</th>
                <th>Medications</th>
                <th>Food Preferences</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pets as $pet)
            <tr>
                <td>{{ $pet->id }}</td>
                <td>{{ $pet->pet_name }}</td>
                <td>{{ ucfirst($pet->category ?? 'N/A') }}</td>
                <td>{{ $pet->age ?? 'N/A' }}</td>
                <td>{{ $pet->breed ?? 'N/A' }}</td>
                <td>{{ ucfirst($pet->gender ?? 'N/A') }}</td>
                <td>{{ $pet->color ?? 'N/A' }}</td>
                <td>{{ $pet->description ?? 'N/A' }}</td>
                <td>${{ number_format($pet->price ?? 0, 2) }}</td>
                <td>{{ ucfirst($pet->listing_type ?? 'N/A') }}</td>
                <td>{{ ucfirst($pet->status ?? 'N/A') }}</td>
                <td>{{ $pet->allergies ?? 'N/A' }}</td>
                <td>{{ $pet->medications ?? 'N/A' }}</td>
                <td>{{ $pet->food_preferences ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('pets.show', $pet->id) }}">
                        <button type="button"
                            style="background: #17a2b8; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">View</button>
                    </a>
                    <a href="{{ route('pets.edit', $pet->id) }}">
                        <button type="button">Edit</button>
                    </a>
                    <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this pet?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="15" style="text-align: center; padding: 20px;">
                    No pets found. <a href="{{ route('pets.create') }}">Add your first pet</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
