 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth())
        <li class="treeview @if($menu_active=='slider'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('slider.create')}}">Slider Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('slider.list')}}">Slider List</a></li>
          </ul>
        </li>

      <li class="treeview @if($menu_active=='services'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('services.create')}}">Services Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('services.list')}}">Services List</a></li>
          </ul>
        </li>

 <li class="treeview @if($menu_active=='courses'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('courses.create')}}">Courses Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('courses.list')}}">Courses List</a></li>
          </ul>
        </li>         

        <li class="treeview @if($menu_active=='training'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Training</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('training.create')}}">Training Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('training.list')}}">Training List</a></li>
          </ul>
        </li>      


        <li class="treeview @if($menu_active=='testimonial'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Testimonial</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('testimonial.create')}}">Testimonial Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('testimonial.list')}}">Testimonial List</a></li>
          </ul>
        </li>     

        <li class="treeview @if($menu_active=='clients'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('clients.create')}}">Clients Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('clients.list')}}">Clients List</a></li>
          </ul>
        </li>      

         <li class="treeview @if($menu_active=='gallery'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('gallery.create')}}">Gallery Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('gallery.list')}}">Gallery List</a></li>
          </ul>
        </li>  
         <li class="treeview @if($menu_active=='achivement'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <i class="fa fa-sliders" aria-hidden="true"></i></span>Achivement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='add'){{'active'}}@endif"><a href="{{route('achivement.create')}}">Achivement Create</a></li>
           <li class="@if($submenu_active=='list'){{'active'}}@endif"><a href="{{route('achivement.list')}}">Achivement List</a></li>
          </ul>
        </li>  
      @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>