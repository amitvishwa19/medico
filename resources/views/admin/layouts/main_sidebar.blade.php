<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background-color: ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('public/admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->firstname}},{{ Auth::user()->lastname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
     

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        

        <!--Dashboard-->
        <li class="{{current_page('dashboard') ? 'active' : '' }}">
          <a href="{{url('/admin/dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          </a>
        </li><!--Dashboard-->

        
        <!--New Vue Appointment -->
        <li class="{{current_page('/appointment') ? 'active' : '' }} treeview">          
          <a href="{{url('/admin/appointment/all')}}">
            <i class="fa fa-envelope"></i> <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('appointment/all') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/all')}}"><i class="fa fa-circle-o"></i> All Appointments</a>
            </li> 
            
            <li class="{{current_page('appointment/new') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/new')}}"><i class="fa fa-circle-o"></i>Book Appointment</a>
            </li>

            <li class="{{current_page('appointment/create') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/create')}}"><i class="fa fa-circle-o"></i> Doctor Schedule</a>
            </li>
          </ul>
        </li><!--Appointment-->
        
        <!--Patient-->
        <li class="{{current_page('user') ? 'active' : '' }} treeview">
          <a href="{{url('/admin/user')}}">
            <i class="fa fa-users"></i>
            <span>Patients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{current_page('user/all') ? 'active' : '' }}">
              <a href=""><i class="fa fa-circle-o"></i> All Patients</a>
            </li>
            <li class="{{current_page('user/newuser') ? 'active' : '' }}">
              <a href="{{url('admin/user/newuser')}}"><i class="fa fa-circle-o"></i> New Patients</a>
            </li>
          </ul>
        </li><!--Patient-->


        <!--Billing-->
        <li class="{{current_page('billing') ? 'active' : '' }} treeview">
          <a href="{{url('/admin/user')}}">
            <i class="fa fa-book"></i>
            <span>Billing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{current_page('billing/all') ? 'active' : '' }}">
              <a href="{{url('/admin/billing/all')}}"><i class="fa fa-circle-o"></i> All Billing</a>
            </li>
            <li class="{{current_page('billing/new') ? 'active' : '' }}">
              <a href="{{url('/admin/billing/new')}}"><i class="fa fa-circle-o"></i> New Billing</a>
            </li>
          </ul>
        </li><!--Billing-->
               
        <!--Options-->
        <li class="{{current_page('option') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Options</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/symptom')}}"><i class="fa fa-circle-o"></i> Symptoms</a></li>
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Visit Type</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Billing Charge</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Reffered</a></li>
          </ul>
        </li><!--Options-->

        <!--Dashboard-->
        <li class="{{current_page('profile') ? 'active' : '' }}">
          <a href="{{url('/admin/profile')}}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li><!--Dashboard-->

        <!--Dashboard-->
        <li class="{{current_page('setting') ? 'active' : '' }}">
          <a href="{{url('/admin/setting')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a>
        </li><!--Dashboard-->


        

        
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>