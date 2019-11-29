<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Permisos
            //Usuarios
            	Permission::create([
            		'name' 			=> 'Navegar Usuarios',
            		'slug' 			=> 'user.index',
            		'description'	=> 'Lista y navega por todos los usurios del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Crear Usuarios',
            		'slug' 			=> 'user.create',
            		'description'	=> 'Crear nuevo usurios del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Detalle de Usuarios',
            		'slug' 			=> 'user.show',
            		'description'	=> 'Ver en detalle cada usurios del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Editar Usuarios',
            		'slug' 			=> 'user.edit',
            		'description'	=> 'Editar cualquier dato de un usurios del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Eliminar Usuarios',
            		'slug' 			=> 'user.destroy',
            		'description'	=> 'Eliminar cualquier usurios del sistema',
            	]);
        	//Roles
            	Permission::create([
            		'name' 			=> 'Navegar Roles',
            		'slug' 			=> 'role.index',
            		'description'	=> 'Lista y navega por todos los role del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Crear Roles',
            		'slug' 			=> 'role.create',
            		'description'	=> 'Crear nuevo role del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Detalle de Roles',
            		'slug' 			=> 'role.show',
            		'description'	=> 'Ver en detalle cada role del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Editar Roles',
            		'slug' 			=> 'role.edit',
            		'description'	=> 'Editar cualquier dato de un role del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Eliminar Roles',
            		'slug' 			=> 'role.destroy',
            		'description'	=> 'Eliminar cualquier role del sistema',
            	]);
        	//Categorias
            	Permission::create([
            		'name' 			=> 'Navegar Categoria',
            		'slug' 			=> 'category.index',
            		'description'	=> 'Lista y navega por todas las categoria del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Crear Categoria',
            		'slug' 			=> 'category.create',
            		'description'	=> 'Crear nueva categoria del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Detalle de Categoria',
            		'slug' 			=> 'category.show',
            		'description'	=> 'Ver en detalle cada categoria del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Editar Categoria',
            		'slug' 			=> 'category.edit',
            		'description'	=> 'Editar cualquier dato de una categoria del sistema',
            	]);
            	Permission::create([
            		'name' 			=> 'Eliminar Categoria',
            		'slug' 			=> 'category.destroy',
            		'description'	=> 'Eliminar cualquier categoria del sistema',
            	]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF Categoria',
                    'slug'          => 'category.pdf',
                    'description'   => 'General PDF de las categorias',
                ]);
            //Productos
                Permission::create([
                    'name'          => 'Navegar productos',
                    'slug'          => 'product.index',
                    'description'   => 'Lista y navega por todos las productos del sistema',
                ]);
                Permission::create([
                    'name'          => 'Crear productos',
                    'slug'          => 'product.create',
                    'description'   => 'Crear nuevo producto del sistema',
                ]);
                Permission::create([
                    'name'          => 'Detalle de productos',
                    'slug'          => 'product.show',
                    'description'   => 'Ver en detalle cada producto del sistema',
                ]);
                Permission::create([
                    'name'          => 'Editar productos',
                    'slug'          => 'product.edit',
                    'description'   => 'Editar datos de los productos del sistema',
                ]);
                Permission::create([
                    'name'          => 'Eliminar productos',
                    'slug'          => 'product.destroy',
                    'description'   => 'Eliminar cualquier producto del sistema',
                ]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF productos',
                    'slug'          => 'product.pdf',
                    'description'   => 'General PDF de los productos',
                ]);
            //Colores
                Permission::create([
                    'name'          => 'Navegar colores',
                    'slug'          => 'color.index',
                    'description'   => 'Lista y navega por todos las colores del sistema',
                ]);
                Permission::create([
                    'name'          => 'Crear colores',
                    'slug'          => 'color.create',
                    'description'   => 'Crear nuevos colores del sistema',
                ]);
                Permission::create([
                    'name'          => 'Editar colores',
                    'slug'          => 'color.edit',
                    'description'   => 'Editar datos de los colores del sistema',
                ]);
                Permission::create([
                    'name'          => 'Eliminar colores',
                    'slug'          => 'color.destroy',
                    'description'   => 'Eliminar cualquier color del sistema',
                ]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF Colores',
                    'slug'          => 'color.pdf',
                    'description'   => 'General PDF de los Colores',
                ]);
            //Tallas
                Permission::create([
                    'name'          => 'Navegar tallas',
                    'slug'          => 'size.index',
                    'description'   => 'Lista y navega por todas las tallas del sistema',
                ]);
                Permission::create([
                    'name'          => 'Crear tallas',
                    'slug'          => 'size.create',
                    'description'   => 'Crear nueva talla del sistema',
                ]);
                Permission::create([
                    'name'          => 'Editar tallas',
                    'slug'          => 'size.edit',
                    'description'   => 'Editar datos de las tallas del sistema',
                ]);
                Permission::create([
                    'name'          => 'Eliminar tallas',
                    'slug'          => 'size.destroy',
                    'description'   => 'Eliminar cualquier talla del sistema',
                ]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF tallas',
                    'slug'          => 'size.pdf',
                    'description'   => 'General PDF de los tallas',
                ]);
            //Materiales
                Permission::create([
                    'name'          => 'Navegar materiales',
                    'slug'          => 'material.index',
                    'description'   => 'Lista y navega por todos los materiales del sistema',
                ]);
                Permission::create([
                    'name'          => 'Crear materiales',
                    'slug'          => 'material.create',
                    'description'   => 'Crear nuevo material del sistema',
                ]);
                Permission::create([
                    'name'          => 'Editar materiales',
                    'slug'          => 'material.edit',
                    'description'   => 'Editar datos de los materiales del sistema',
                ]);
                Permission::create([
                    'name'          => 'Eliminar materiales',
                    'slug'          => 'material.destroy',
                    'description'   => 'Eliminar cualquier material del sistema',
                ]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF materiales',
                    'slug'          => 'material.pdf',
                    'description'   => 'General PDF de los materiales',
                ]);
            //Precios
                Permission::create([
                    'name'          => 'Navegar precios',
                    'slug'          => 'price.index',
                    'description'   => 'Lista y navega por todos las precios del sistema',
                ]);
                Permission::create([
                    'name'          => 'Crear precios',
                    'slug'          => 'price.create',
                    'description'   => 'Crear nuevo precio del sistema',
                ]);
                Permission::create([
                    'name'          => 'Editar precios',
                    'slug'          => 'price.edit',
                    'description'   => 'Editar datos de los precios del sistema',
                ]);
                Permission::create([
                    'name'          => 'Eliminar precios',
                    'slug'          => 'price.destroy',
                    'description'   => 'Eliminar cualquier precio del sistema',
                ]);
                //PDF
                Permission::create([
                    'name'          => 'Generar PDF precios',
                    'slug'          => 'price.pdf',
                    'description'   => 'General PDF de los precios',
                ]);
    }
}
