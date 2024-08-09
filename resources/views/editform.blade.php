<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Data</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Add this to your app.css or in a <style> tag within the <head> of your Blade template */
.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ced4da;
    border-radius: 0.375rem;
    box-sizing: border-box;
}

.form-group input:focus, .form-group textarea:focus {
    border-color: #007bff;
    outline: none;
}

.text-danger {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.btn {
    padding: 0.75rem 1.25rem;
    border: none;
    border-radius: 0.375rem;
    color: #fff;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.btn-update {
    background-color: #28a745;
}

.btn-update:hover {
    background-color: #218838;
}

.btn-secondary {
    background-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 1.5rem;
}

.mt-5 {
    margin-top: 3rem;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Staff Data</h2>

        <form action="{{ route('staff.editdata', [$staffdata->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $staffdata->name) }}" class="form-control">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $staffdata->email) }}" class="form-control">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control">{{ old('message', $staffdata->message) }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-update">Update</button>
        </form>

        <a href="{{ route('show.data') }}" class="btn btn-secondary mt-3">Back</a>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
