<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
</head>

<body>
    <h1>Edit a Pet</h1>

    <div>
        @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{ route('pets.update', $pet->id) }}">
        @csrf
        @method('PUT')

        <!-- Pet Name -->
        <div>
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" value="{{ old('pet_name', $pet->pet_name) }}" required>
        </div>

        <!-- Category -->
        <div>
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">-- Select --</option>
                <option value="dog" {{ old('category', $pet->category) == 'dog' ? 'selected' : '' }}>Dog</option>
                <option value="cat" {{ old('category', $pet->category) == 'cat' ? 'selected' : '' }}>Cat</option>
            </select>
        </div>

        <!-- Age -->
        <div>
            <label for="age">Age (years):</label>
            <input type="number" id="age" name="age" value="{{ old('age', $pet->age) }}">
        </div>

        <!-- Breed -->
        <div>
            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" value="{{ old('breed', $pet->breed) }}">
        </div>

        <!-- Gender -->
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="">-- Select --</option>
                <option value="male" {{ old('gender', $pet->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $pet->gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Color -->
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="{{ old('color', $pet->color) }}">
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description"
                rows="4">{{ old('description', $pet->description) }}</textarea>
        </div>

        <!-- Price -->
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $pet->price ?? 0) }}"
                required>
        </div>

        <!-- Listing Type (ADDED THIS) -->
        <div>
            <label for="listing_type">Listing Type:</label>
            <select id="listing_type" name="listing_type" required>
                <option value="">-- Select --</option>
                <option value="sell" {{ old('listing_type', $pet->listing_type) == 'sell' ? 'selected' : '' }}>For Sale
                </option>
                <option value="adopt" {{ old('listing_type', $pet->listing_type) == 'adopt' ? 'selected' : '' }}>For
                    Adoption</option>
            </select>
        </div>

        <!-- Status -->
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="available"
                    {{ old('status', $pet->status ?? 'available') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="adopted" {{ old('status', $pet->status ?? '') == 'adopted' ? 'selected' : '' }}>Adopted
                </option>
            </select>
        </div>

        <!-- Allergies -->
        <div>
            <label for="allergies">Allergies:</label>
            <textarea id="allergies" name="allergies">{{ old('allergies', $pet->allergies) }}</textarea>
        </div>

        <!-- Medications -->
        <div>
            <label for="medications">Medications:</label>
            <textarea id="medications" name="medications">{{ old('medications', $pet->medications) }}</textarea>
        </div>

        <!-- Food Preferences -->
        <div>
            <label for="food_preferences">Food Preferences:</label>
            <textarea id="food_preferences"
                name="food_preferences">{{ old('food_preferences', $pet->food_preferences) }}</textarea>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit">Update Pet</button>
            <a href="{{ route('pets.index') }}">
                <button type="button">Cancel</button>
            </a>
        </div>
    </form>

</body>

</html>
