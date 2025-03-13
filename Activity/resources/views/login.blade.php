<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 
 <div class="container mt-5">
     <div class="row justify-content-center">
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header">User Login</div>
 
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
 
                     <form method="POST" action="{{ route('login') }}">
                         @csrf
                         <div class="mb-3">
                             <label>Email:</label>
                             <input type="email" name="email" class="form-control" required>
                         </div>
                         <div class="mb-3">
                             <label>Password:</label>
                             <input type="password" name="password" class="form-control" required>
                         </div>
                         <button type="submit" class="btn btn-primary w-100">Login</button>
                     </form>
 
                     {{-- 
<div class="text-center mt-3">
    <a href="{{ route('register') }}">Don't have an account? Sign up</a>
</div>
--}}
                 </div>
             </div>
         </div>
     </div>
 </div>
 
 </body>
 </html>