<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/images/pngwing.com.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{url('admin/dashboard')}}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Home</li>
        <li>
            <a href="{{url('admin/home_banner')}}">
                <div class="parent-icon"><i class="lni lni-image"></i>
                </div>
                <div class="menu-title">Home banner</div>
            </a>
        </li>
        <li>
            <a href="{{url('admin/manage_size')}}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-font-size"></i>
                </div>
                <div class="menu-title">Manage Size</div>
            </a>
        </li>
        <li>
            <a href="{{url('admin/manage_color')}}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-color-fill"></i>
                </div>
                <div class="menu-title">Manage Color</div>
            </a>
        </li>
        <li>
            <a href="{{url('admin/brand')}}">
                <div class="parent-icon"><i class="lni lni-postcard"></i>
                </div>
                <div class="menu-title">Manage brand</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-shape-triangle"></i>
                </div>
                <div class="menu-title">Attribute</div>
            </a>
            <ul>
                <li><a href="{{url('admin/attribute_name')}}"><i class="fadeIn animated bx bx-chevron-right"></i>Attribute name</a>
                </li>
                <li><a href="{{url('admin/attribute_value')}}"><i class="fadeIn animated bx bx-chevron-right"></i>Attribute value</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-line-double"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li><a href="{{url('admin/category')}}"><i class="fadeIn animated bx bx-chevron-right"></i>Category</a>
                </li>
                <li><a href="{{url('admin/category_attribute')}}"><i class="fadeIn animated bx bx-chevron-right"></i>Category attribute</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li><a href="{{url('admin/product')}}"><i class="fadeIn animated bx bx-chevron-right"></i></i>Products</a>
                </li>
{{--                <li><a href="{{url('admin/product')}}"><i class='bx bx-radio-circle'></i>Category attribute</a>--}}
{{--                </li>--}}
            </ul>
        </li>
        <li class="menu-label">Tax</li>
        <li>
            <a href="{{url('admin/tax')}}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-task"></i>
                </div>
                <div class="menu-title">Tax</div>
            </a>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a href="{{url('admin/profile')}}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
