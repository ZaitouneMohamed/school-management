@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Exam Schedule List</h1>
                </div><!-- /.col -->
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="" class="btn btn-primary">Add Student</a>
                    </ol>
                </div><!-- /.col --> --}}
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
                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Class</label>
                                        <select name="class_id" id="classe" class="form-control">
                                            <option>select a class please</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Exames</label>
                                        @foreach ($exames as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
                        <form action="{{ route('admin.ClassTimetable.StoreData') }}" method="post">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">
                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Exam Schedule List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Week</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room Number</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            @php $i = 1  @endphp
                                            @forelse ($weeks as $item)
                                                <input type="hidden" name="timetable[{{ $i }}][week_id]"
                                                    value="{{ $item->week_id }}">
                                                <tr>
                                                    <td>{{ $item->week_name }}</td>
                                                    <td>
                                                        <input type="time"
                                                            name="timetable[{{ $i }}][start_time]"
                                                            value="{{ $item->start_time ? $item->start_time : '' }}"
                                                            id="">
                                                    </td>
                                                    <td>
                                                        <input type="time"
                                                            name="timetable[{{ $i }}][end_time]" id=""
                                                            value="{{ $item->end_time ? $item->end_time : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number"
                                                            name="timetable[{{ $i }}][room_number]"
                                                            value="{{ $item->room_number ? $item->room_number : '' }}"
                                                            id="">
                                                    </td>
                                                </tr>
                                                @php $i++ @endphp
                                            @empty
                                            @endforelse
                                        </tbody> --}}
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </form>
                    @endif
                    <!-- /.card -->
                </div>
            </div>
        </div>
        </div>
        <!-- /.row -->
    @endsection

    {{-- @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.getElementById('classe').addEventListener('change', function() {
                var selectedCategorie = this.value;
                var url = "{{ route('admin.ClassTimetable.GetSubjects', ':id') }}";
                url = url.replace(':id', selectedCategorie);
                $.ajax({
                    url: url,
                    success: function(response) {
                        var subCategoriesHtml = '';
                        response.forEach(function(categorie) {
                            subCategoriesHtml += '<option value="' + categorie.id + '">' + categorie
                                .name +
                                '</option>';
                        });
                        document.getElementById('subjects').innerHTML = subCategoriesHtml;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    @endsection --}}
