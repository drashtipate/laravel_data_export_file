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
        
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>City</th>
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
                        
                    </tr>
                @endforeach
            </tbody> 
        </table> 
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script> 
</body>
</html>