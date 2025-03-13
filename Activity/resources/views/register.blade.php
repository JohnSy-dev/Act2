<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Registration</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 
 <div class="container mt-5">
     <div class="row justify-content-center">
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header">User Registration</div>
 
                 <div class="card-body">
                     @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
 
                     <form method="POST" action="{{ route('register') }}">
                         @csrf
                         <div class="mb-3">
                             <label>Name:</label>
                             <input type="text" name="name" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label>Email:</label>
                             <input type="email" name="email" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label>Password:</label>
                             <input type="password" name="password" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label>Confirm Password:</label>
                             <input type="password" name="password_confirmation" class="form-control" required>
                         </div>
                         <button type="submit" class="btn btn-success w-100">Register</button>
                     </form>
 
                     <div class="text-center mt-3">
                         <a href="{{ route('login') }}">Already have an account? Log in</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 
 </body>
 </html>