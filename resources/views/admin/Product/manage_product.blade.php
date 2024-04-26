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
                            <form action="{{url('admin/update_product')}}" id="" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4">Product</h5>
                                <input type="hidden" name="id" value="{{$id}}">
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
                                @if($data->image != '')
                                    <div class="row mb-3">
                                        <label for="image" class="col-sm-3 col-form-label">Product Image</label>
                                        <div class="col-sm-9">
                                            <img width="150px" height="150px" src="{{$data->image}}">
                                        </div>
                                    </div>
                                @endif
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
                                    <label for="sale_id" class="col-sm-3 col-form-label">Sale</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="sale_id" name="sale_id">
                                            <option value="">Select sale</option>
                                            @foreach($sales as $sale)
                                                @if($data->sale_id == $sale->id)
                                                    <option selected value="{{$sale->id}}">{{$sale->value}}%
                                                    </option>
                                                @else
                                                    <option value="{{$sale->id}}">{{$sale->value}}
                                                        %
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="category" name="category_id">
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
                                        <span id="multiAttr">
                                            @if(isset($data['attribute'][0]->id))
                                                <select class="form-control" id="attribute_id" name="attribute_id[]"
                                                        multiple>
                                                    @foreach($data['attribute'] as $attr)
                                                        <option selected
                                                                value="{{$attr['attribute_values']->id}}">{{$attr['attribute_values']->value}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="brand" name="brand_id">
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
                                        <select class="form-select" id="tax" name="tax_id">
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
                                        <div class="col-sm-3 mb-2">
                                            <button type="button" id="addAttributeButton"
                                                    class="btn btn-primary px-2 py-2">
                                                Add attribute
                                            </button>
                                        </div>
                                        @php
                                            $count = 1;
                                            $imageCount = 999;
                                        @endphp
                                        <div class="row" id="addAttr">
                                            @if(isset($data['product_attributes']) && count($data['product_attributes']) > 0)
                                                @foreach($data['product_attributes'] as $productAttr)
                                                    <div class="row" id="addAttr_{{$count}}">
                                                        <input type="hidden" name="productAttrId[]" value="{{$productAttr->id}}">
                                                        <div class="col-sm-3 mb-2">
                                                            <select class="form-select" id="color" name="color_id[]">
                                                                @foreach($colors as $color)
                                                                    @if(isset($productAttr) && $productAttr->color_id == $color->id)
                                                                        <option selected class="box_color" style="background-color: {{$color->value}}" value="{{$color->id}}">{{$color->text}}</option>
                                                                    @else
                                                                        <option class="box_color" style="background-color: {{$color->value}}" value="{{$color->id}}">{{$color->text}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <select class="form-select" id="size" name="size_id[]">
                                                                @foreach($sizes as $size)
                                                                    @if($productAttr->size_id == $size->id)
                                                                        <option selected value="{{$size->id}}">{{$size->size}}</option>
                                                                    @else
                                                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="text" name="sku[]" class="form-control" id="sku"
                                                                   placeholder="Enter SKU" value="{{$productAttr->sku}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="number" name="mrp[]" class="form-control" id="mrp"
                                                                   placeholder="Enter MRP" value="{{$productAttr->mrp}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="number" name="price[]" class="form-control" id="price"
                                                                   placeholder="Enter price" value="{{$productAttr->price}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="number" name="qty[]" class="form-control" id="qty"
                                                                   placeholder="Enter qty" value="{{$productAttr->qty}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="text" name="length[]" class="form-control" id="length"
                                                                   placeholder="Enter length" value="{{$productAttr->length}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="text" name="width[]" class="form-control" id="width"
                                                                   placeholder="Enter width" value="{{$productAttr->width}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="text" name="height[]" class="form-control" id="height"
                                                                   placeholder="Enter height" value="{{$productAttr->height}}">
                                                        </div>
                                                        <div class="col-sm-3 mb-2">
                                                            <input type="text" name="weight[]" class="form-control" id="weight"
                                                                   placeholder="Enter weight" value="{{$productAttr->weight}}">
                                                        </div>
                                                        <div class="row mb-3 mb-2">
                                                            <label for="addAttrImages" class="col-sm-3 col-form-label">Product
                                                                Image</label>
                                                            <div class="col-sm-9 row">
                                                                <input type="hidden" name="imageValue[]" value="{{$count}}">
                                                                <div class="mb-3 col-sm-6 mb-2">
                                                                    <button type="button" id="addAttrImages"
                                                                            onclick="addAttrImage('attrImage_{{$count}}','{{$count}}')"
                                                                            class="btn btn-primary">Add
                                                                        image
                                                                    </button>
                                                                </div>
                                                                <div id="attrImage_{{$count}}">
                                                                    @foreach($productAttr['images'] as $imageAttr)
                                                                        <div id="attrImage_{{$imageCount}}">
                                                                            <div class="col-sm-12 mb-2">
                                                                                <input type="file" name="attr_image_{{$count}}[]"
                                                                                       class="form-control image-input" data-image-id="{{$imageAttr->id}}" id="image_{{$count}}">
                                                                            </div>
                                                                            @if($imageAttr->image != '')
                                                                                <img src="{{$imageAttr->image}}" width="100px" height="100px">
                                                                            @endif
                                                                            @if($imageCount !== 111)
                                                                                <button type="button" id="addAttrImages"
                                                                                        onclick="removeAttr('attrImage_{{$imageCount}}','{{$imageAttr->id}}','product_attr_images')"
                                                                                        class="btn btn-danger mb-2">Remove image
                                                                                </button>
                                                                            @endif
                                                                        </div>
                                                                            <?php $imageCount++; ?>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($count !== 1)
                                                            <button type="button" id="addAttrImages"
                                                                    onclick="removeAttr('addAttr_{{$count}}','{{$productAttr->id}}','product_attrs')"
                                                                    class="btn btn-danger mb-2">Remove attribute
                                                            </button>
                                                        @endif
                                                    </div>
                                                        <?php $count++; ?>
                                                        <?php $imageCount++; ?>
                                                @endforeach
                                            @else
                                                <div class="row" id="addAttr_{{$count}}">
                                                    <input type="hidden" name="productAttrId[]" value="{{$id}}">
                                                    <div class="col-sm-3 mb-2">
                                                        <select class="form-select" id="color" name="color_id[]">
                                                            @foreach($colors as $color)
                                                                    <option class="box_color" style="background-color: {{$color->value}}" value="{{$color->id}}">{{$color->text}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <select class="form-select" id="size" name="size_id[]">
                                                            @foreach($sizes as $size)
                                                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="text" name="sku[]" class="form-control" id="sku"
                                                               placeholder="Enter SKU">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="number" name="mrp[]" class="form-control" id="mrp"
                                                               placeholder="Enter MRP">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="number" name="price[]" class="form-control" id="price"
                                                               placeholder="Enter price">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="number" name="qty[]" class="form-control" id="qty"
                                                               placeholder="Enter qty">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="text" name="length[]" class="form-control" id="length"
                                                               placeholder="Enter length">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="text" name="width[]" class="form-control" id="width"
                                                               placeholder="Enter width">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="text" name="height[]" class="form-control" id="height"
                                                               placeholder="Enter height">
                                                    </div>
                                                    <div class="col-sm-3 mb-2">
                                                        <input type="text" name="weight[]" class="form-control" id="weight"
                                                               placeholder="Enter weight">
                                                    </div>
                                                    <div class="row mb-3 mb-2">
                                                        <label for="addAttrImages" class="col-sm-3 col-form-label">Product
                                                            Image</label>
                                                        <div class="col-sm-9 row">
                                                            <input type="hidden" name="imageValue[]" value="{{$count}}">
                                                            <div class="mb-3 col-sm-6 mb-2">
                                                                <button type="button" id="addAttrImages"
                                                                        onclick="addAttrImage('attrImage_{{$count}}','{{$count}}')"
                                                                        class="btn btn-primary">Add
                                                                    image
                                                                </button>
                                                            </div>
                                                            <div id="attrImage_{{$count}}">
                                                                    <div id="attrImage_{{$imageCount}}">
                                                                        <div class="col-sm-12 mb-2">
                                                                            <input type="file" name="attr_image_{{$count}}[]"
                                                                                   class="form-control" id="image_{{$count}}">
                                                                        </div>
                                                                        @if($imageCount !== 111)
                                                                            <button type="button" id="addAttrImages"
                                                                                    onclick="removeImage('attrImage_{{$imageCount}}')"
                                                                                    class="btn btn-danger mb-2">Remove image
                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($count !== 1)
                                                        <button type="button" id="addAttrImages"
                                                                onclick="removeAttrAdd('addAttr_{{$count}}')"
                                                                class="btn btn-danger mb-2">Remove attribute
                                                        </button>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" id="" class="btn btn-primary">Save</button>
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
                    if (result.status == 'Success') {
                        // console.log(result);
                        html += '<select class="form-control" id="attribute_id" name="attribute_id[]" multiple>';
                        jQuery.each(result.data.data, function (key, val) {
                            jQuery.each(val.values, function (attrKey, attrVal) {
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
        var url = "{{ url('admin/removeAttrId') }}";
        function removeAttrId(id,type){
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                data: {
                    'id': id,
                    'type':type
                },
                type: 'post',
                success: function (result) {
                    console.log(result);
                    if (result.status == 'Success') {
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
        }
    </script>
    <script>
        var count = 111;
        $('#addAttributeButton').click(function (e) {
            count++;
            var id = 'addAttr_' + count + '';
            var id_image_attr = 'attrImage_' + count + '';
            var html = '';
            var colorData = $('#color').html();
            var sizeData = $('#size').html();
            html += '<div class="row" id="addAttr_' + count + '"><input type="hidden" name="productAttrId[]" value="0"><div class="col-sm-3 mb-2"><select class="form-select" id="color" name="color_id[]">"' + colorData + '"</select></div>';
            html += '<div class="col-sm-3 mb-2"><select class="form-select" id="size" name="size_id[]">"' + sizeData + '"</select></div>';
            html += '<div class="col-sm-3 mb-2"><input type="text" name="sku[]" class="form-control" id="sku" placeholder="Enter SKU"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="number" name="mrp[]" class="form-control" id="mrp" placeholder="Enter MRP"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="number" name="price[]" class="form-control" id="price" placeholder="Enter price"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="number" name="qty[]" class="form-control" id="qty" placeholder="Enter qty"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="text" name="length[]" class="form-control" id="length" placeholder="Enter length"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="text" name="width[]" class="form-control" id="width" placeholder="Enter width"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="text" name="height[]" class="form-control" id="height" placeholder="Enter height"></div>';
            html += '<div class="col-sm-3 mb-2"><input type="text" name="weight[]" class="form-control" id="weight" placeholder="Enter weight"></div>';
            html += '<div class="row mb-3 mb-2"><label for="addAttrImages" class="col-sm-3 col-form-label">Product Image</label><div class="col-sm-9 row"><input type="hidden" name="imageValue[]" value="' + count + '"><div class="mb-3 col-sm-6"><button type="button" id="addAttrImages" onclick="addAttrImage(\'' + id_image_attr + '\',\'' + count + '\')" class="btn btn-primary">Add image</button></div><div id="attrImage_' + count + '"><div class="col-sm-12 mb-2"><input type="file" name="attr_image_' + count + '[]" class="form-control" id="image_' + count + '"></div></div></div></div>';
            html += '<button type="button" id="addAttrImages" onclick="removeAttrAdd(\'' + id + '\')" class="btn btn-danger mb-2">Remove attribute</button></div>';
            $('#addAttr').append(html);
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".image-input").change(function() {
                var imageId = $(this).data("image-id");
                var inputName = $(this).attr("name");
                // Thêm ID của ảnh vào tên của input file
                $(this).attr("name", inputName.replace("[]", "[" + imageId + "]"));
            });
        });

        function removeAttr(id,attrId='',type='image') {
            $('#' + id + '').remove();
            if (type != '' ){
                removeAttrId(attrId,type);
            }
        }
        function removeAttrAdd(id){
            $('#' + id + '').remove();
        }
        function removeImage(id) {
            $('#' + id + '').remove();
        }

        var imageCount = 1990;

        function addAttrImage(id, count) {
            imageCount++;
            var idImage = 'attrImage_' + imageCount + '';
            var html = '<div id="attrImage_' + imageCount + '"><div class="col-sm-12 mb-2"><input type="file" name="attr_image_' + count + '[]" class="form-control" id="image_{{$count}}"> </div><button type="button" id="addAttrImages" onclick="removeImage(\'' + idImage + '\')" class="btn btn-danger mb-2">Remove image</button> </div>';
            $('#' + id + '').append(html);
        }
    </script>
@endsection
