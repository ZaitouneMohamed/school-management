@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New class</h1>
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
                        <form action="{{ route('admin.class_subject.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group col-md-8">
                                    <label for="name">Classe name</label>
                                    <select name="classe_id" required class="form-control">
                                        <option value="">select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="name">Subjects</label>
                                    @foreach ($subjects as $item)
                                        <div>
                                            <label for="" style="font-weight: normal">
                                                <input type="checkbox" name="subjects[]" value="{{ $item->id }}"
                                                    id="">{{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach

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
