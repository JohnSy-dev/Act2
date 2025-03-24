@extends('bases')
 
 @section('title', 'Students List')
 
 @section('content')
 <div class="container mt-4">
     <h2 class="mb-3">Students List</h2>
     
 
     <a href="{{ route('students.create') }}" class="btn btn-success mb-3">
         <i class="fas fa-plus"></i> Add New Student
     </a>
 
     @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
     @endif
 
     @if($students->isEmpty())
         <p class="alert alert-warning">No students available.</p>
     @else
         <div class="table-responsive">
             <table class="table table-striped table-bordered text-center align-middle">
                 <thead class="table-dark">
                     <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Course</th>
                         <th>Year</th>
                         <th>Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach($students as $student)
                         <tr>
                             <td>{{ $student->id }}</td>
                             <td>{{ ucfirst($student->name) }}</td>
                             <td>{{ ucfirst($student->course) }}</td>
                             <td>{{ $student->year }}</td>
                             <td>
                                 <!-- Edit Button to Open Modal -->
                                 <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}">
                                     <i class="fas fa-edit"></i> Edit
                                 </button>
 
                                 <!-- Delete Button to Open Modal -->
                                 <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $student->id }}">
                                     <i class="fas fa-trash-alt"></i> Delete
                                 </button>
                             </td>
                         </tr>
 
                         <!-- Edit Student Modal -->
                         <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $student->id }}" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Edit Student Info</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form action="{{ route('students.update', $student->id) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <div class="mb-3">
                                                 <label class="form-label">Student Name</label>
                                                 <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
                                             </div>
                                             <div class="mb-3">
                                                 <label class="form-label">Course</label>
                                                 <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
                                             </div>
                                             <div class="mb-3">
                                                 <label class="form-label">Year</label>
                                                 <input type="number" name="year" class="form-control" value="{{ $student->year }}" required>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                 <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
 
                         <!-- Delete Confirmation Modal -->
                         <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $student->id }}" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title">Confirm Delete</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                     </div>
                                     <div class="modal-body">
                                         <p>Are you sure you want to delete <strong>{{ ucfirst($student->name) }}</strong>?</p>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                         <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger">Delete</button>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </tbody>
             </table>
         </div>
     @endif
 
     <!-- Logout Button at the Bottom -->
     <div class="text-center mt-4">
         <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="btn btn-danger">
                 <i class="fas fa-sign-out-alt"></i> Logout
             </button>
         </form>
     </div>
 </div>
    @endsection
