<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and ad minlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();


// Route::get('/home2', 'HomeController@index2')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

// Ruta para Acceder al Registro de Persona Natural
Route::get('admin/PersonaNatural', ['as' =>'admin/PersonaNatural', 'uses' => 'PersonaController@RegistrarPersonaNatural']);

// Ruta para Acceder al Registro de Categoria
Route::get('admin/Categoria', ['as' =>'admin/Categoria', 'uses' => 'CategoriaController@AñadirCategoria']);
// Ruta para mostrar mensajes
Route::get('admin/MostrarMensajes', ['as' =>'admin/MostrarMensajes', 'uses' => 'MensajeController@MostrarMensajes']);

// Ruta para guardar mensaje
Route::get('admin/MostrarCategorias', ['as' =>'admin/MostrarCategorias', 'uses' => 'CategoriaController@MostrarCategorias']);

// Ruta para guardar mensaje
Route::post('/', ['as' =>'/', 'uses' => 'MensajeController@GuardarMensaje']);

// Ruta para Acceder al Registro de Producto
Route::get('admin/Producto', ['as' =>'admin/Producto', 'uses' => 'ProductoController@AñadirProducto']);

// Ruta para Acceder al Registro de Producto
Route::get('admin/PersonaJuridica', ['as' =>'admin/PersonaJuridica', 'uses' => 'PersonaJuridicaController@RegistrarPersonaJuridica']);

// Ruta para Acceder al Mostrar de Producto
Route::get('admin/MostrarProductos', ['as' =>'admin/MostrarProductos', 'uses' => 'ProductoController@MostrarProductos']);


//Perfiles

Route::get('admin/Perfil', ['as' => 'admin/Perfil', 'uses' => 'PersonaController@VerPersona']);

//Boleta Pedido

Route::get('Boleta/Pedido', ['as' => 'Boleta/Pedido', 'uses' => 'BoletaController@GenerarBoleta']);
Route::post('Boleta/Pedido', ['as' => 'Boleta/Pedido', 'uses' => 'BoletaController@RegistrarBoleta']);

//Trasportes Crud


Route::get('Transporte/Crud', ['as' => 'Transporte/Crud', 'uses' => 'TransporteController@CrudPro']);

Route::post('Transporte/Listar', ['as' => 'Transporte/Crud', 'uses' => 'TransporteController@ListarMensajes']);



//Mensajes Crud
Route::get('Mensaje/Crud', ['as' => 'Mensaje/Crud', 'uses' => 'MensajeController@CrudPro']);

//traer datos
Route::post('Mensaje/Listar', ['as' => 'Mensaje/Listar' , 'uses' => 'MensajeController@ListarMensajes']);
// ejemplo --->  Route::get('PersonaNatural/Ver/{id}', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@VerPersonaNatural']);-
//ver
Route::get('Mensaje/Ver/{id}', ['as' => 'Mensaje/Crud', 'uses' => 'MensajeController@VerMensaje']);


//CRUD Personas Naturales

Route::get('PersonaNatural/Crud', ['as' => 'PersonaNatural/Crud', 'uses' => 'PersonaController@CrudProNatural']);
Route::post('PersonaNatural/Listar', ['as' => 'PersonaNatural/Crud', 'uses' => 'PersonaController@ListarPersonasNaturales']);
Route::get('PersonaNatural/Ver/{id}', ['as' =>'PersonaNatural/Ver', 'uses' => 'PersonaController@VerPersonaNatural']);
Route::get('PersonaNatural/Editar/{id}',['as' => 'PersonaNatural/editar', 'uses' => 'PersonaController@EditarPersonaNatural']);
Route::post('PersonaNatural/Editar', ['as' =>'PersonaNatural/Editar', 'uses' => 'PersonaController@EditarGuardarPersonaNatural']);

//Fin Personas Naturales

//Personas Juridicas
Route::get('PersonaJuridica/Crud', ['as'=>'PersonaJuridica/Crud', 'uses' => 'PersonaController@CrudProJuridica']);
Route::post('PersonaJuridica/Listar', ['as' => 'PersonaJuridica/Crud', 'uses' => 'PersonaController@ListarPersonasJuridicas']);
Route::get('PersonaJuridica/Ver/{id}', ['as' => 'PersonaJuridica/Ver', 'uses' => 'PersonaController@VerPersonaJuridica']);
Route::get('PersonaJuridica/Editar/{id}', ['as' => 'PersonaJuridica/Editar', 'uses' => 'PersonaController@EditarPersonaJuridica']);
Route::post('PersonaJuridica/Editar', ['as' => 'PersonaJuridica/Editar', 'uses' => 'PersonaController@EditarGuardarPersonaJuridica']);


// Mostar el Listado : GET

Route::get('Productos/Crud', ['as' =>'Productos/Crud', 'uses' => 'ProductoController@CrudProductos']);

// Traer los Datos.
Route::post('Productos/Listar', ['as' =>'Productos/Crud', 'uses' => 'ProductoController@ListarProductos']);

Route::get('Productos/Ver/{id}', ['as' => 'Productos/Crud', 'uses' => 'ProductoController@VerProducto']);

Route::get('Productos/Editar/{id}', ['as' =>'Productos/Crud', 'uses' => 'ProductoController@EditarProducto']);

Route::post('Productos/Editar', ['as' =>'Producto/Editar', 'uses' => 'ProductoController@EditarGuardarProducto']);






//Factura
Route::get('Venta/Factura', ['as' =>'Venta/Factura', 'uses' => 'VentaController@RegistrarFactura']);

Route::post('Venta/Factura', ['as' =>'Venta/Factura', 'uses' => 'VentaController@GuardarFactura']);

// fin factura

//CRUD CATEGORIA
Route::get('Categoria/Crud', ['as' => 'Categoria/Crud', 'uses' => 'CategoriaController@CrudPro']);

//traer datos
Route::post('Categoria/Listar', ['as' => 'Categoria/Listar' , 'uses' => 'CategoriaController@ListarCategorias']);

Route::get('Categoria/Ver/{id}', ['as' => 'Categoria/Crud', 'uses' => 'CategoriaController@VerCategorias']);
Route::get('Categoria/Editar/{id}', ['as' => 'Categoria/Crud', 'uses' => 'CategoriaController@EditarCategorias']);

Route::post('Categoria/Editar', ['as' => 'Categoria/Editar', 'uses' => 'CategoriaController@EditarGuardarCategorias']);





// Ruta para Guardar Registro de Producto
Route::post('admin/Producto', ['as' =>'admin/Producto', 'uses' => 'ProductoController@GuardarProducto']);

// Ruta para Guardar Registro de Producto
Route::post('admin/PersonaJuridica', ['as' =>'admin/PersonaJuridica', 'uses' => 'PersonaJuridicaController@GuardarPersonaJuridica']);

// Ruta para Guardar Registro de Categoria
Route::post('admin/Categoria', ['as' =>'admin/Categoria', 'uses' => 'CategoriaController@GuardarCategoria']);

// Ruta para Guardar Registro de Persona Natural
Route::post('admin/PersonaNatural', ['as' =>'admin/PersonaNatural', 'uses' => 'PersonaController@GuardarPersonaNatural']);

// Rutas Llamadas Ajax de Zonas.
Route::post('Zona/Listar_Provincias_x_Departamento/{id}',['as' => 'Zona/Listar_Provincias_x_Departamento', 'uses' => 'ZonaController@Listar_Provincias_x_Departamento']);

Route::post('Zona/Listar_Distritos_x_Provincia/{id}',['as' => 'Zona/Listar_Distritos_x_Provincia', 'uses' => 'ZonaController@Listar_Distritos_x_Provincia']);

//Reportes

Route::get('Reportes', ['as' =>'Reportes', 'uses' => 'PDFController@reportes']);
Route::get('reporte_usuarios/{tipo}', 'PDFController@crear_reporte_usuarios');
Route::get('reporte_ventas/{tipo}', 'PDFController@crear_reporte_ventas');
Route::get('listado_graficas',['as' =>'listado_graficas','uses' =>  'GraficasController@Personas']);
Route::get('grafica_registros_personas/{anio}/{mes}',['as' =>'grafica_registros' ,'uses' => 'GraficasController@registros_mes']);
Route::get('grafica_registros_ventas/{anio}/{mes}',['as' =>'grafica_ventas' ,'uses' => 'GraficasController@ventas_mes']);
