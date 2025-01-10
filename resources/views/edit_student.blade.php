<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Student</h1>

        <!-- Display Errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="stu_name" class="form-label">Name</label>
                <input type="text" name="stu_name" id="stu_name" class="form-control" value="{{ $student->stu_name }}" required>
            </div>
            <div class="mb-3">
                <label for="stu_email" class="form-label">Email</label>
                <input type="email" name="stu_email" id="stu_email" class="form-control" value="{{ $student->stu_email }}" required>
            </div>
            <div class="mb-3">
                <label for="stu_contact" class="form-label">Contact</label>
                <input type="text" name="stu_contact" id="stu_contact" class="form-control" value="{{ $student->stu_contact }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Student</button>
        </form>
    </div>
</body>
</html>
