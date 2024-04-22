@php use Illuminate\Support\Facades\URL; @endphp
@extends("admin.layout")
@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Colors</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Colors</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                                class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item"
                                                                                               href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <button type="button" onclick="saveData('0','','')" class="btn btn-outline-info px-5 radius-30 mb-3"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add color
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->text}}</td>
                                    <td class="box_color" style="background-color: {{$list->value}}"></td>
                                    <td>
                                        <button type="button"
                                                onclick="saveData('{{$list->id}}','{{$list->text}}','{{$list->value}}')"
                                                class="btn btn-outline-info px-5 radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update
                                        </button>
                                        <button onclick="deleteData('{{$list->id}}','colors')" class="btn btn-outline-danger px-5 radius-30">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add color</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formSubmit" action="{{url('admin/updateColor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row mb-3">
                                    <label for="enter_text" class="col-sm-3 col-form-label">Text</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="text" class="form-control" id="enter_text"
                                               placeholder="Text" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="enter_value" class="col-sm-3 col-form-label">Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="value" class="form-control" id="enter_value"
                                               placeholder="Hex code" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <span id="submitButton">
                            <button type="submit" id="" class="btn btn-primary">Save</button>
                        </span>
                    </div>
                    <input type="hidden" name="id" id="enter_id">
                </form>
            </div>
        </div>
    </div>
    <script>
        function saveData(id, text, value) {
            $('#enter_id').val(id);
            $('#enter_text').val(text);
            $('#enter_value').val(value);
        }
    </script>
@endsection
