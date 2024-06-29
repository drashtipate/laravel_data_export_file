<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
</head>
<body>
        <div class="container">
            <h2 class="text-center mt-3">Student Registration Form</h2>
            <form action="{{ route('student.store') }}"  method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name')  is-invalid  @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>         
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email')  is-invalid  @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="mb-3">
                    <label for="email" class="form-label">Date of Birth</label>
                    <input type="datetime-local" style="background:content-box;" class="form-control @error('date_of_birth')  is-invalid  @enderror" id="dob" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    <i class="fas fa-calendar-alt" style="position: absolute; right: 21rem; top: 30%; color:gray;"></i>
                    @error('date_of_birth')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>            
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control @error('city')  is-invalid  @enderror" id="city" name="city" value="{{ old('city') }}">
                    @error('city')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> 
                <button type="submit" class="btn btn-primary">Submit</button> 
                <button class="btn btn-primary"><a href="{{ url('student') }}" style="color:#fff; text-decoration:none;">Back</a></button>
                @if ($message = session('success'))
                    <div class="alert alert-success alert-dismissible fade show mx-0 mt-3 col-6" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" style="float:right;" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </form>
        </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script> 
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        config = {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            altFormat: "F j, Y (h:S K)"
        }
        flatpickr("input[type=datetime-local]", config);
    </script>
</body>
</html>