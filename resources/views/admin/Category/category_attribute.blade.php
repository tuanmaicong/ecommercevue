@php use Illuminate\Support\Facades\URL; @endphp
@extends("admin.layout")
@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category attribute</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category attribute</li>
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
                        data-bs-target="#exampleModal">Add category attribute
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Attribute</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $list)
{{--                                @php prx($list); @endphp--}}
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->category->name}}</td>
                                    <td>{{$list->attribute[0]->name}}</td>
                                    <td>
                                        <button type="button"
                                                onclick="saveData('{{$list->id}}','{{$list->category_id}}','{{$list->attribute_id}}')"
                                                class="btn btn-outline-info px-5 radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update
                                        </button>
                                        <button onclick="deleteData('{{$list->id}}','category_attribute')" class="btn btn-outline-danger px-5 radius-30">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Category id</th>
                                <th>Attribute id</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Category attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formSubmit" action="{{url('admin/update_category_attribute')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row mb-3">
                                    <label for="enter_category_id" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example">
                                            <option value="0">Select category</option>
                                            @foreach($category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}({{$cate->slug}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="enter_attribute_id" class="col-sm-3 col-form-label">Attribute</label>
                                    <div class="col-sm-9">
                                        <select name="attribute_id" id="attribute_id" class="form-select" aria-label="Default select example">
                                            <option value="0">Select attribute</option>
                                            @foreach($attribute as $attri)
                                                <option value="{{$attri->id}}">{{$attri->name}}({{$attri->slug}})</option>
                                            @endforeach
                                        </select>
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
        function saveData(id, category_id, attribute_id) {
            // if(id == 0){
            //     $('#category_id option[value="' + id + '"]').attr('selected',true);
            //     $('#attribute_id option[value="' + id + '"]');
            // }
            // console.log(id);
            $('#enter_id').val(id);
            $('#category_id').val(category_id);
            $('#attribute_id').val(attribute_id);

        }
    </script>
@endsection
