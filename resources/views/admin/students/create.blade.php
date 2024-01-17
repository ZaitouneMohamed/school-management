@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Student</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.row -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('admin.student.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="password" value="password">
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Enter name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Enter email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">admission number</label>
                                    <input type="text" id="admission_number"
                                        class="form-control @error('admission_number') is-invalid @enderror"
                                        name="admission_number" placeholder="Enter email"
                                        value="{{ old('admission_number') }}">
                                    @error('admission_number')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">role_number</label>
                                    <input type="text" id="role_number"
                                        class="form-control @error('role_number') is-invalid @enderror" name="role_number"
                                        placeholder="Enter email" value="{{ old('role_number') }}">
                                    @error('role_number')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Classe</label>
                                    <select name="class_id" class="form-control" id="">
                                        <option>shoose classe</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option>shoose gender</option>
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                    </select>
                                    @error('gender')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">date of birth</label>
                                    <input type="date" id="date_of_birth"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" placeholder="Enter email" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">caste</label>
                                    <input type="text" id="caste"
                                        class="form-control @error('caste') is-invalid @enderror" name="caste"
                                        placeholder="Enter email" value="{{ old('caste') }}">
                                    @error('caste')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">religion</label>
                                    <input type="text" id="religion"
                                        class="form-control @error('religion') is-invalid @enderror" name="religion"
                                        placeholder="Enter email" value="{{ old('religion') }}">
                                    @error('religion')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">mobile</label>
                                    <input type="text" id="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                        placeholder="Enter email" value="{{ old('mobile') }}">
                                    @error('mobile')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">admission date</label>
                                    <input type="date" id="email"
                                        class="form-control @error('admission_date') is-invalid @enderror"
                                        name="admission_date" placeholder="Enter email"
                                        value="{{ old('admission_date') }}">
                                    @error('admission_date')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">profile pic</label>
                                    <input type="file" id="email"
                                        class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic"
                                        placeholder="Enter email" value="{{ old('profile_pic') }}">
                                    @error('profile_pic')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">blood group</label>
                                    <input type="text" id="blood_group"
                                        class="form-control @error('blood_group') is-invalid @enderror"
                                        name="blood_group" placeholder="Enter Blood Group" value="{{ old('blood_group') }}">
                                    @error('blood_group')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">height</label>
                                    <input type="number" id="height"
                                        class="form-control @error('height') is-invalid @enderror" name="height"
                                        placeholder="Enter height" value="{{ old('height') }}">
                                    @error('height')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">weight</label>
                                    <input type="number" id="weight"
                                        class="form-control @error('weight') is-invalid @enderror" name="weight"
                                        placeholder="Enter weight" value="{{ old('weight') }}">
                                    @error('weight')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
        </div>
        </div>
        </div>
        <!-- /.row -->
    @endsection
