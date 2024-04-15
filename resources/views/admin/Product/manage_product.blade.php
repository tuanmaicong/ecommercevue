@php use Illuminate\Support\Facades\URL; @endphp
@extends("admin.layout")
@section("content")
    <script src="{{ asset('ckeditor4/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4">Product</h5>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                               value="{{$data->name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug"
                                               value="{{$data->slug}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="item_code" class="col-sm-3 col-form-label">Item code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="item_code" class="form-control" id="item_code"
                                               placeholder="Item code" value="{{$data->item_code}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="keywords" class="col-sm-3 col-form-label">Keywords</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="keywords" class="form-control" id="keywords"
                                               placeholder="Keywords" value="{{$data->keywords}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="category" name="category">
                                            @foreach($cat as $category)
                                                @if($data->category_id == $category->id)
                                                    <option selected value="{{$category->id}}">{{$category->name}}
                                                        ({{$category->slug}})
                                                    </option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}
                                                        ({{$category->slug}})
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="attribute_id" class="col-sm-3 col-form-label">Attribute</label>
                                    <div class="col-sm-9">
                                        <span id="multiAttr"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="brand" name="brand">
                                            @foreach($brand as $br)
                                                @if($data->brand_id == $br->id)
                                                    <option selected value="{{$br->id}}">{{$br->text}}</option>
                                                @else
                                                    <option value="{{$br->id}}">{{$br->text}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tax" class="col-sm-3 col-form-label">Tax</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="tax" name="tax">
                                            @foreach($tax as $t)
                                                @if($data->tax_id == $t->id)
                                                    <option selected value="{{$t->id}}">{{$t->text}}</option>
                                                @else
                                                    <option value="{{$t->id}}">{{$t->text}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="desc" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea rows="3" id="desc" name="description" class="form-control"
                                                  placeholder="Description" required>{{$data->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="color" class="col-sm-3 col-form-label">Product Attribute</label>
                                    <div class="col-sm-9 row mb-3">
                                        <div class="col-sm-3">
                                            <button type="button" id="addAttributeButton" class="btn btn-primary">Add
                                                Attribute
                                            </button>
                                        </div>
                                        <div class="row" id="addAttr">
                                            <div class="col-sm-3">
                                                <select class="form-select" id="color" name="color_id[]">
                                                    @foreach($colors as $color)
                                                        <option class="box_color"
                                                                style="background-color: {{$color->value}}"
                                                                value="{{$color->id}}">{{$color->text}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-select" id="size" name="size_id[]">
                                                    @foreach($sizes as $size)
                                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="sku[]" class="form-control" id="sku"
                                                       placeholder="Enter SKU" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" name="mrp[]" class="form-control" id="mrp"
                                                       placeholder="Enter MRP" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" name="price[]" class="form-control" id="price"
                                                       placeholder="Enter price" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="number" name="qty[]" class="form-control" id="qty"
                                                       placeholder="Enter qty" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="length[]" class="form-control" id="length"
                                                       placeholder="Enter length" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="width[]" class="form-control" id="width"
                                                       placeholder="Enter width" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="height[]" class="form-control" id="height"
                                                       placeholder="Enter height" value="">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" name="weight[]" class="form-control" id="weight"
                                                       placeholder="Enter weight" value="">
                                            </div>
                                            <div class="row mb-3">
                                                <label for="desc" class="col-sm-3 col-form-label">Product Image</label>
                                                <div class="col-sm-9 row">
                                                    <div class="mb-3 col-sm-3">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="button" id="addAttrImages" onclick="addAttrImage()" class="btn btn-primary">Add image</button>
                                                        </div>
                                                    </div>
                                                    <div id="attrImage">
                                                        <div class="col-sm-3">
                                                            <input type="file" name="attr_image[]" class="form-control" id="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                                            <button type="button" class="btn btn-light px-4">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var editor = CKEDITOR.replace('desc');
        CKFinder.setupCKEditor(editor);

        $("#category").change(function (e) {
            var category_id = $('#category').val();
            var html = '';
            var url = "{{ url('admin/get_attribute') }}";
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                data: {
                    'category_id': category_id,
                },
                type: 'post',
                success: function (result) {
                    console.log(result);
                    if (result.status === 'Success') {
                        // console.log(result);
                        html += '<select class="form-select" id="attribute_id" name="attribute_id[]" multiple>';
                        jQuery.each(result.data.data, function (key, val) {
                            jQuery.each(val.values, function (attrKey, attrVal) {
                                console.log(val);
                                html += '<option value="' + attrVal.id + '">' + val.attribute[0].name + '(' + attrVal.value + ')</option>'
                            })
                        })
                        html += '</select>';
                        $('#multiAttr').html(html);
                        $('#attribute_id').multiSelect();
                        // showAlter(result.status, result.message)
                        // console.log(html);
                    } else {
                        showAlter(result.status, result.message)
                    }
                },
                error: function (result) {
                    showAlter(result.responseJSON.status, result.responseJSON.message);
                }
            });
        });
    </script>
    <script>
        $('#addAttributeButton').click(function (e) {
            var html = '';
            var colorData = $('#color').html();
            var sizeData = $('#size').html();
            html += '<div class="col-sm-3"><select class="form-select" id="color" name="color">"' + colorData + '"</select></div>';
            html += '<div class="col-sm-3"><select class="form-select" id="size" name="size">"' + sizeData + '"</select></div>';
            html += '<div class="col-sm-3"><input type="text" name="sku[]" class="form-control" id="sku" placeholder="Enter SKU"></div>';
            html += '<div class="col-sm-3"><input type="number" name="mrp[]" class="form-control" id="mrp" placeholder="Enter MRP"></div>';
            html += '<div class="col-sm-3"><input type="number" name="price[]" class="form-control" id="price" placeholder="Enter price"></div>';
            html += '<div class="col-sm-3"><input type="number" name="qty[]" class="form-control" id="qty" placeholder="Enter qty"></div>';
            html += '<div class="col-sm-3"><input type="text" name="length[]" class="form-control" id="length" placeholder="Enter length"></div>';
            html += '<div class="col-sm-3"><input type="text" name="width[]" class="form-control" id="width" placeholder="Enter width"></div>';
            html += '<div class="col-sm-3"><input type="text" name="height[]" class="form-control" id="height" placeholder="Enter height"></div>';
            html += '<div class="col-sm-3"><input type="text" name="weight[]" class="form-control" id="weight" placeholder="Enter weight"></div>';
            html += '<div class="row mb-3"><label for="desc" class="col-sm-3 col-form-label">Product Image</label><div class="col-sm-9 row"><div class="mb-3 col-sm-3"><div class="d-flex justify-content-center"><button type="button" id="addAttrImages" onclick="addAttrImage()" class="btn btn-primary">Add image</button></div></div><div id="attrImage"><div class="col-sm-3"><input type="file" name="attr_image[]" class="form-control" id="image"></div></div></div></div>';
            $('#addAttr').append(html);
        });
    </script>
    <script>
        function addAttrImage(){
            var html = '<div class="col-sm-3"><input type="file" name="attr_image[]" class="form-control" id="image"> </div>';
            $('#attrImage').append(html);
        }
    </script>
@endsection
