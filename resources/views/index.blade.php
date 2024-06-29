<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    
    <style>
        /* Add this CSS to your new stylesheet file */

        /* Small size for pagination icons */
        .pagination .page-link .fas,
        .pagination .page-link .material-icons {
            font-size: 14px; /* You can adjust the font size as per your requirement */
            /* Any other styles you want to apply */
        }

    </style>
</head>
<body>
    <div class="container mt-3">
        
        <h2 class=" text-center">Student Data</h2>
        <div class="mt-5">
            <a href="{{ route('student.export') }}" class="btn btn-primary">
                Export Data to Excel
            </a>
            <a href="{{ route('student.pdf') }}" class="btn btn-primary">
                Export Data to PDF
            </a>
            <a href="{{ route('student.create') }}" class="btn btn-primary" style="float:right;">
                Add Student
            </a>
            @if ($message = session('error'))
            <div class="alert alert-danger mx-0 mt-3 col-6 alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" style="float:right;" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->city }}</td>
                        <td>
                            <!-- Delete Button -->
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete it?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
        </table> 
        <div class="mt-5">
            <!-- {{ $students->links() }} -->
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script> 
</body>
</html>