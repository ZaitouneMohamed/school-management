@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Classes List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('admin.class.create') }}" class="btn btn-primary">Add New Class</a>
                    </ol>
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
                        <div class="card-header">
                            <h3 class="card-title">Search</h3>
                        </div>
                        <form action="{{ route('admin.class.index') }}" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ request()->name }}" autocomplete="name" autofocus>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="date">date</label>
                                        <input type="date" value="{{ request()->email }}" class="form-control"
                                            name="date">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Classes List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>Status</th>
                                        <th>created by</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->Admin->name }}</td>
                                            <td class="row">
                                                <a href="{{ route('admin.class.edit', $item) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.class.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $data->links() }}
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
