<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Students</h1>

        <!-- Display Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Display Students -->
        <div class="mt-4">
            <h3>Student List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->stu_name }}</td>
                        <td>{{ $student->stu_email }}</td>
                        <td>{{ $student->stu_contact }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add Student Form -->
        <div class="mt-5">
            <h3>Add New Student</h3>
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="stu_name" class="form-label">Name</label>
                    <input type="text" name="stu_name" id="stu_name" class="form-control">
                    @error('stu_name')
                    <div class="" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stu_email" class="form-label">Email</label>
                    <input type="email" name="stu_email" id="stu_email" class="form-control" >
                    @error('stu_email')
                    <div class="" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stu_contact" class="form-label">Contact</label>
                    <input type="text" name="stu_contact" id="stu_contact" class="form-control" >
                    @error('stu_contact')
                    <div class="" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Student</button>
            </form>
        </div>
    </div>
</body>

</html>