<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Pet</title>
</head>

<body>
    <h1>Add New Pet</h1>

    <!-- <div>
        @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div> -->

    <form method="post" action="{{ route('pets.store') }}">
        @csrf
        @method('post')

        <!-- Pet Name -->
        <div>
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" required>
        </div>

        <!-- Category -->
        <div>
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">-- Select --</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </select>
        </div>

        <!-- Age -->
        <div>
            <label for="age">Age (years):</label>
            <input type="number" id="age" name="age">
        </div>

        <!-- Breed -->
        <div>
            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed">
        </div>

        <!-- Gender -->
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="">-- Select --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <!-- Color -->
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color">
        </div>

        <!-- Description -->
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>

        <!-- Price -->
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="0" required>
        </div>

        <div>
            <label for="listing_type">Listing Type:</label>
            <select id="listing_type" name="listing_type" required>
                <option value="">-- Select --</option>
                <option value="sell">For Sale</option>
                <option value="adopt">For Adoption</option>
            </select>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="available" selected>Available</option>
                <option value="adopted">Adopted</option>
            </select>
        </div>

        <!-- Allergies -->
        <div>
            <label for="allergies">Allergies:</label>
            <textarea id="allergies" name="allergies"></textarea>
        </div>

        <!-- Medications -->
        <div>
            <label for="medications">Medications:</label>
            <textarea id="medications" name="medications"></textarea>
        </div>

        <!-- Food Preferences -->
        <div>
            <label for="food_preferences">Food Preferences:</label>
            <textarea id="food_preferences" name="food_preferences"></textarea>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit">Save Pet</button>
            <a href="{{ route('pets.index') }}">
                <button type="button">Cancel</button>
            </a>
        </div>
    </form>
</body>

</html>-
