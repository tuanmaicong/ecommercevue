@php use Illuminate\Support\Facades\URL; @endphp
@extends("admin.layout")
@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                <button type="button" onclick="saveData('0','','','','')" class="btn btn-outline-info px-5 radius-30 mb-3"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add category
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Attribute name</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $list)
                                <tr>
                                    <td>{{$list->id}}</td>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->slug}}</td>
                                    <td><img src="{{asset($list->image)}}" width="100px" height="100px"></td>
                                    <td>{{$list->parent_category_id}}</td>
                                    <td>{{$list->created_at}}</td>
                                    <td>{{$list->updated_at}}</td>
                                    <td>
                                        <button type="button"
                                                onclick="saveData('{{$list->id}}','{{$list->name}}','{{$list->slug}}','{{$list->image}}',{{$list->parent_category_id}})"
                                                class="btn btn-outline-info px-5 radius-30" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Update
                                        </button>
                                        <button onclick="deleteData('{{$list->id}}','categories')" class="btn btn-outline-danger px-5 radius-30">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Attribute name</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formSubmit" action="{{url('admin/update_category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row mb-3">
                                    <label for="enter_name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="enter_name"
                                               placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="enter_slug" class="col-sm-3 col-form-label">Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" class="form-control" id="enter_slug"
                                               placeholder="Slug" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="enter_slug" class="col-sm-3 col-form-label">Parent category id</label>
                                    <div class="col-sm-9">
                                        <select name="parent_category_id" id="parent_category_id" class="form-select" aria-label="Default select example">
                                            <option value="0">Select parent id</option>
                                            @foreach($data as $item)
                                                <option value="{{$item->id}}">{{$item->name}},{{$item->slug}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="enter_image" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" id="photo" required>
                                    </div>
                                    <div id="image_key">
                                        <img src="" id="imgPreview" height="200px" width="200px">
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
        var chechID = 0;
        function saveData(id, name, slug, image ,parent_category_id) {
            if(chechID != 0){
                $('#parent_category_id option[value="'+chechID+'"]').show();
            }
            chechID = id;
            $('#enter_id').val(id);
            $('#enter_name').val(name);
            $('#enter_slug').val(slug);
            $('#parent_category_id').val(parent_category_id);
            $('#parent_category_id option[value="'+id+'"]').hide();
            if (image == '') {
                var key_image = "{{ URL::asset('assets/images/pngegg.png') }}";
                $('#imgPreview').attr('src', key_image);
                $('#photo').prop('required',true);
            } else {
                // Nếu bản ghi có ảnh, hiển thị ảnh đó
                var key_image = image;
                $('#imgPreview').attr('src', "{{ URL::asset('') }}" + key_image);
                $('#photo').prop('required',false);
            }

            // Xử lý sự kiện thay đổi của input file
            $(document).ready(function () {
                $('#photo').change(function () {
                    var input = this;
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#imgPreview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                });
            });
        }
    </script>
@endsection
