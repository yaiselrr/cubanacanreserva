<?php

use Illuminate\Database\Seeder;
use App\Modelos\Permiso;

class PermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //****Contenido********
        Permiso::generateFor('roles','Roles');
        Permiso::generateFor('users','Usuarios');
        Permiso::generateFor('hoteles','Hotel');
        Permiso::generateFor('hoteles-flexy-drive','Hoteles de Flexy & Drive');
        Permiso::generateFor('hoteles-eventos','Hotel de un Evento');
        Permiso::generateFor('hoteles-recogida','Hotel de Recogida de Excurción');
        Permiso::generateFor('precios-pax-hotels','Precios Pax de Hotel');
        Permiso::generateFor('preguntas','Preguntas Frecuentes');
        Permiso::generateFor('servicios','Servicio');
        Permiso::generateFor('quienes-somos','Quienes Somos');
        Permiso::generateFor('tarjeta-credito','Tarjetas de Creditos');
        Permiso::generateFor('autos-flexifly-drive','Autos Flexi Fly & Drive');
        Permiso::generateFor('viajes-medidas','Viajes a la Medida');
        Permiso::generateFor('precios-por-viajes-medidas','Precios por Temporada Viaje a la Medida');
        Permiso::generateFor('flexi-drive','Flexi & Drive');
        Permiso::generateFor('contactos','Información e Contacto');
        Permiso::generateFor('excursiones','Excursiones');
        Permiso::generateFor('encuestas','Encuestas');
        Permiso::generateFor('reservas','Reservas');

        Permiso::generateFor('privados','Privados');
        Permiso::generateFor('privadosimport','Privado Importar');
        Permiso::generateFor('preciosunicos','Precios Unicos');
        Permiso::generateFor('rutas','Rutas');
        Permiso::generateFor('lugaresrecogida','Lugares de Recogida');
        Permiso::generateFor('colectivos','Colectivos');
        Permiso::generateFor('colectivosimport','Colectivo Importar');
        Permiso::generateFor('conectandos','Conectados');
        Permiso::generateFor('oficinas','Oficinas');
        Permiso::generateFor('buros','Buro');
        Permiso::generateFor('carruseles','Carrusel');
        Permiso::generateFor('enlace_interesantes','Enlace Interesante');
        Permiso::generateFor('enlace_reds','Enlace Redes');
        Permiso::generateFor('blogs','Blog');
        Permiso::generateFor('circuitos','Circuito');
        Permiso::generateFor('clientes','Cliente');
        Permiso::generateFor('precipaxs','Precios Pax Circuito');
        Permiso::generateFor('eventos','Evento');


        //******Nomencladores*********
        Permiso::generateFor('categorias','Categorias');
        Permiso::generateFor('facilidades','Facilidad');
        Permiso::generateFor('plan-alojamiento','Plan Alojamiento');
        Permiso::generateFor('dias-antelacion-reserva','Dias Antelacion Reserva');
        Permiso::generateFor('duracion','Duracion');
        Permiso::generateFor('idiomas','Idiomas');
        Permiso::generateFor('dias-semana','Dias de la Semana');
        Permiso::generateFor('provincias','Provincias');
        Permiso::generateFor('lugar','Lugares');
        Permiso::generateFor('modalidad','Modalidades');
        Permiso::generateFor('frecuencia','Frecuencia');
        Permiso::generateFor('nacionalidades','Nacionalidades');
    }
}
