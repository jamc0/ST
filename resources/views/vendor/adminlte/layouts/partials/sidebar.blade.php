<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    {{-- <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" /> --}}
                    
                    <img src="/img/avatar.png" class="img-circle" alt="Imagen" />
                
                </div>
                <div class="pull-left info">
                    <p><strong>{{ Auth::user()->name }}</strong>
                    </p>
                    
                        
                    
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success" ></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">
                
                @role('admin')
                    ADMINISTRADOR
                @else
                    CAJERO
                @endrole
            </li>
        @role('admin')
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='sidebar-home fa fa-hand-o-right'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <!-- <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <li class="treeview">
                <a href="#"><i class='sidebar-añadir fa fa-plus'></i> <span>Añadir</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/PersonaNatural')}}">Cliente</a></li>
                    <li><a href="{{url('admin/PersonaJuridica')}}">Proveedor</a></li>
                    <li><a href="{{url('admin/Categoria')}}">Categoria</a></li>
                    <li><a href="{{url('admin/Producto')}}">Producto</a></li>
                    
                </ul>
            </li>
            

            <!-- <li><a href="{{url('admin/PersonaNatural')}}">R. Persona Natural</a></li>
            <li><a href="{{url('admin/PersonaJuridica')}}">R. Persona Juridica</a></li>
            <li><a href="{{url('admin/Categoria')}}">Añadir Categoria</a></li>
            <li><a href="{{url('admin/Producto')}}">Añadir Producto</a></li>
            <li><a href="{{url('admin/MostrarProductos')}}">Mostrar Productos</a></li> -->
            
            <li class="treeview">
                <a href="#"><i class='sidebar-mostrar  fa fa-search'></i> <span>Mostrar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/MostrarProductos')}}">Productos</a></li>
                    <li><a href="{{url('admin/MostrarMensajes')}}">Mensajes</a></li>
                    <li><a href="{{url('admin/MostrarCategorias')}}">Categorias</a></li>
                    <!-- <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li> -->
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='sidebar-seguridad fa fa-unlock'></i> <span>Seguridad</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/users')}}">Usuarios</a></li>
                    <li><a href="{{url('admin/roles')}}">Roles</a></li>
                    <li><a href="{{url('admin/permissions')}}">Permisos</a></li>
                    {{-- <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li> --}}
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='sidebar-reportes fa fa-area-chart'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Reportes')}}">Reportes</a></li>
                    <li><a href="{{url('listado_graficas')}}">Graficas</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='sidebar-ventas fa fa-folder-open'></i> <span>Ventas/Pedidos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Venta/Factura')}}">Boleta</a></li>
                    <li><a href="{{url('Boleta/Pedido')}}">Pedido</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='sidebar-cruds fa fa-gear'></i> <span>CRUD´s</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('PersonaNatural/Crud')}}">Clientes</a></li>
                    <li><a href="{{url('PersonaJuridica/Crud')}}">Proveedores</a></li>
                    <li><a href="{{url('Mensaje/Crud')}}">Mensajes</a></li>
                    {{-- <li><a href="{{url('Transporte/Crud')}}">Transportes</a></li> --}}
                    <li><a href="{{url('Productos/Crud')}}">Productos</a></li>
                    <li><a href="{{url('Categoria/Crud')}}">Categorias</a></li>

                </ul>

                

                </ul>
            </li>
         @else
            <li class="treeview">
                <a href="#"><i class='sidebar-mostrar  fa fa-search'></i> <span>Mostrar</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/MostrarProductos')}}">Productos</a></li>
                    {{-- <li><a href="{{url('admin/MostrarMensajes')}}">Mensajes</a></li> --}}
                    <li><a href="{{url('admin/MostrarCategorias')}}">Categorias</a></li>
                    <!-- <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li> -->
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='sidebar-ventas fa fa-folder-open'></i> <span>Ventas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Venta/Factura')}}">Boleta</a></li>
                    {{-- <li><a href="{{url('Boleta/Pedido')}}">Pedido</a></li> --}}
                </ul>
            </li>
        @endrole    
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
