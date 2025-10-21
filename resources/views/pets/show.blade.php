<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pet->pet_name }} - Pet Details</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f5f5f5;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .back-button {
        display: inline-block;
        padding: 8px 16px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .back-button:hover {
        background: #0056b3;
    }

    h1 {
        color: #333;
        border-bottom: 3px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .pet-header {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        border-left: 5px solid #007bff;
    }

    .pet-header h2 {
        margin: 0 0 10px 0;
        color: #333;
    }

    .badges {
        margin-top: 10px;
    }

    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: bold;
        margin-right: 10px;
    }

    .badge-category {
        background: #17a2b8;
        color: white;
    }

    .badge-type {
        background: #6c757d;
        color: white;
    }

    .badge-adopted {
        background: #6c757d;
        color: white;
    }

    .badge-available {
        background: #28a745;
        color: white;
    }

    .info-section {
        margin-bottom: 25px;
    }

    .info-section h3 {
        color: #007bff;
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 8px;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table td {
        padding: 12px;
        border: 1px solid #dee2e6;
    }

    table td:first-child {
        background: #f8f9fa;
        font-weight: bold;
        width: 200px;
        color: #495057;
    }

    .price-box {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px;
        border-radius: 8px;
        text-align: center;
        margin: 20px 0;
    }

    .price-box h2 {
        margin: 0;
        font-size: 2.5em;
    }

    .price-box p {
        margin: 10px 0 0 0;
        font-size: 1.1em;
        opacity: 0.9;
    }

    .health-section {
        background: #fff3cd;
        border-left: 5px solid #ffc107;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .health-section h3 {
        color: #856404;
        border-bottom: 2px solid #ffeaa7;
        margin-top: 0;
    }

    .health-item {
        margin-bottom: 12px;
        line-height: 1.6;
    }

    .health-label {
        font-weight: bold;
        color: #856404;
    }

    .description-box {
        background: #e7f3ff;
        border-left: 5px solid #007bff;
        padding: 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .description-box p {
        margin: 0;
        line-height: 1.6;
        color: #333;
    }

    .action-buttons {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #e9ecef;
        text-align: center;
    }

    .action-buttons button,
    .action-buttons a {
        margin: 0 5px;
    }

    button[type="submit"],
    button[type="button"],
    a button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
    }

    .btn-edit {
        background: #007bff;
        color: white;
    }

    .btn-edit:hover {
        background: #0056b3;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background: #c82333;
    }

    .btn-back {
        background: #6c757d;
        color: white;
    }

    .btn-back:hover {
        background: #5a6268;
    }

    .empty-value {
        color: #6c757d;
        font-style: italic;
    }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('pets.index') }}" class="back-button">← Back to All Pets</a>

        <h1>Pet Details</h1>

        <div class="pet-header">
            <h2>{{ $pet->pet_name }}</h2>
            <div class="badges">
                <span class="badge badge-category">{{ ucfirst($pet->category) }}</span>
                <span class="badge badge-type">{{ ucfirst($pet->listing_type) }}</span>
                @if($pet->status == 'adopted')
                <span class="badge badge-adopted">✓ Adopted</span>
                @else
                <span class="badge badge-available">Available</span>
                @endif
            </div>
        </div>

        <!-- Basic Information -->
        <div class="info-section">
            <h3>Basic Information</h3>
            <table>
                <tr>
                    <td>Pet ID</td>
                    <td>{{ $pet->id }}</td>
                </tr>
                <tr>
                    <td>Pet Name</td>
                    <td>{{ $pet->pet_name }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ ucfirst($pet->category) }}</td>
                </tr>
                <tr>
                    <td>Breed</td>
                    <td>{{ $pet->breed ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $pet->age ? $pet->age . ' years old' : 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $pet->gender ? ucfirst($pet->gender) : 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>{{ $pet->color ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ ucfirst($pet->status) }}</td>
                </tr>



                <tr>
                    <td>Pet Listing</td>
                    <td>{{ ucfirst($pet->listing_type ?? 'N/A') }}</td>

                </tr>


            </table>
        </div>

        <!-- Description -->
        @if($pet->description)
        <div class="info-section">
            <h3>Description</h3>
            <div class="description-box">
                <p>{{ $pet->description }}</p>
            </div>
        </div>
        @endif

        <!-- Price Information -->
        <div class="price-box">
            <h2>${{ number_format($pet->price ?? 0, 2) }}</h2>
            <p>{{ $pet->listing_type == 'sell' ? 'Purchase Price' : 'Adoption Fee' }}</p>
        </div>

        <!-- Health Information -->
        @if($pet->allergies || $pet->medications || $pet->food_preferences)
        <div class="health-section">
            <h3>🏥 Health Information</h3>

            @if($pet->allergies)
            <div class="health-item">
                <span class="health-label">Allergies:</span> {{ $pet->allergies }}
            </div>
            @endif

            @if($pet->medications)
            <div class="health-item">
                <span class="health-label">Medications:</span> {{ $pet->medications }}
            </div>
            @endif

            @if($pet->food_preferences)
            <div class="health-item">
                <span class="health-label">Food Preferences:</span> {{ $pet->food_preferences }}
            </div>
            @endif
        </div>
        @endif

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('pets.edit', $pet->id) }}">
                <button type="button" class="btn-edit">Edit</button>
            </a>

            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete"
                    onclick="return confirm('Are you sure you want to delete {{ $pet->pet_name }}?')">
                    Delete
                </button>
            </form>

            <a href="{{ route('pets.index') }}">
                <button type="button" class="btn-back">Back to List</button>
            </a>
        </div>
    </div>
</body>

</html>
