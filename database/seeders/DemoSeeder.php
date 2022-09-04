<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Requests\EntidadRequest\EntidadRequest;
use App\Models\Entidad;
use App\Models\Invitado;
use App\Models\Seccion;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'enabledUser'   => [
                'platform.index'                            => true,
                'platform.index.profile'                    => true,
                'platform.systems.users'                    => true,
                'platform.systems.entidads'                 => true,
                'platform.systems.seccions'                 => true,
                'platform.systems.turnos'                   => true,
                'platform.systems.attachment'               => true,
            ],
            'disabledUser'   => [
                'platform.index'                            => true,
                'platform.index.profile'                    => true,
            ],
        ];

        ////////////////////////////////////////////////////////////////////MERCADONA
        $user1 = new User();
        $user1->name = 'test1';
        $user1->email = 'test1@mercadona.com';
        $user1->password = bcrypt('test1');
        $user1->fullName = 'Encargado 1';
        $user1->dni = '11223344A';
        $user1->telefono = '666333111';
        $user1->domicilio = 'Calle A Numero 1';
        $user1->permissions = $permissions['disabledUser'];
        $user1->save();

        $entidad1 = new Entidad();
        $entidad1->user_id = $user1->id;
        $entidad1->nombreEntidad = 'Mercadona';
        $entidad1->direccionEntidad = 'C. la Parra, 11, 14550 Montilla, Córdoba';
        $entidad1->horarioEntidad = "9:00h - 21:30h";
        $entidad1->nombreFiscal = "Mercadona SA";
        $entidad1->nif = "11223352M";
        $entidad1->url = "https://www.mercadona.es/";
        $entidad1->save();

        $seccion11 = new Seccion();
        $seccion11->entidad_id = $entidad1->id;
        $seccion11->nombreSeccion = 'Carnicería';
        $seccion11->turnoActual = '0';
        $seccion11->ultimoTurno = '0';
        $seccion11->save();

            $invitado1 = new Invitado();
            $invitado1->save();

            $invitado2 = new Invitado();
            $invitado2->save();

            $invitado3 = new Invitado();
            $invitado3->save();

            $invitado4 = new Invitado();
            $invitado4->save();

            $invitado5 = new Invitado();
            $invitado5->save();

            $invitado6 = new Invitado();
            $invitado6->save();

                $turno111 = new Turno();
                $turno111->seccion_id = $seccion11->id;
                $turno111->invitado_id = $invitado1->id;
                $turno111->numTurno = '1';
                $turno111->fechaTurno = '2022-08-24 17:25:52';
                $turno111->save();

                $turno112 = new Turno();
                $turno112->seccion_id = $seccion11->id;
                $turno112->invitado_id = $invitado2->id;
                $turno112->numTurno = '2';
                $turno112->fechaTurno = '2022-08-24 17:26:52';
                $turno112->save();

                $turno113 = new Turno();
                $turno113->seccion_id = $seccion11->id;
                $turno113->invitado_id = $invitado3->id;
                $turno113->numTurno = '3';
                $turno113->fechaTurno = '2022-08-24 17:26:58';
                $turno113->save();

                $turno114 = new Turno();
                $turno114->seccion_id = $seccion11->id;
                $turno114->invitado_id = $invitado4->id;
                $turno114->numTurno = '4';
                $turno114->fechaTurno = '2022-08-24 17:28:23';
                $turno114->save();

                $turno115 = new Turno();
                $turno115->seccion_id = $seccion11->id;
                $turno115->invitado_id = $invitado5->id;
                $turno115->numTurno = '5';
                $turno115->fechaTurno = '2022-08-24 17:43:12';
                $turno115->save();

        $seccion11->ultimoTurno = '5';
        $seccion11->save();

        $seccion12 = new Seccion();
        $seccion12->entidad_id = $entidad1->id;
        $seccion12->nombreSeccion = 'Pescadería';
        $seccion12->turnoActual = '0';
        $seccion12->ultimoTurno = '0';
        $seccion12->save();

                $turno121 = new Turno();
                $turno121->seccion_id = $seccion12->id;
                $turno121->invitado_id = $invitado1->id;
                $turno121->numTurno = '1';
                $turno121->fechaTurno = '2022-08-24 17:25:52';
                $turno121->save();

                $turno122 = new Turno();
                $turno122->seccion_id = $seccion12->id;
                $turno122->invitado_id = $invitado2->id;
                $turno122->numTurno = '2';
                $turno122->fechaTurno = '2022-08-24 17:26:52';
                $turno122->save();

                $turno123 = new Turno();
                $turno123->seccion_id = $seccion12->id;
                $turno123->invitado_id = $invitado3->id;
                $turno123->numTurno = '3';
                $turno123->fechaTurno = '2022-08-24 17:26:58';
                $turno123->save();

        $seccion12->ultimoTurno = '3';
        $seccion12->save();

        $seccion13 = new Seccion();
        $seccion13->entidad_id = $entidad1->id;
        $seccion13->nombreSeccion = 'Charcutería';
        $seccion13->turnoActual = '0';
        $seccion13->ultimoTurno = '0';
        $seccion13->save();

                $turno131 = new Turno();
                $turno131->seccion_id = $seccion13->id;
                $turno131->invitado_id = $invitado1->id;
                $turno131->numTurno = '1';
                $turno131->fechaTurno = '2022-08-24 17:25:52';
                $turno131->save();

                $turno132 = new Turno();
                $turno132->seccion_id = $seccion13->id;
                $turno132->invitado_id = $invitado3->id;
                $turno132->numTurno = '2';
                $turno132->fechaTurno = '2022-08-24 17:26:52';
                $turno132->save();

        $seccion13->ultimoTurno = '2';
        $seccion13->save();

        $seccion14 = new Seccion();
        $seccion14->entidad_id = $entidad1->id;
        $seccion14->nombreSeccion = 'Panadería';
        $seccion14->turnoActual = '0';
        $seccion14->ultimoTurno = '0';
        $seccion14->save();

                $turno141 = new Turno();
                $turno141->seccion_id = $seccion14->id;
                $turno141->invitado_id = $invitado1->id;
                $turno141->numTurno = '1';
                $turno141->fechaTurno = '2022-08-24 17:25:52';
                $turno141->save();

                $turno142 = new Turno();
                $turno142->seccion_id = $seccion14->id;
                $turno142->invitado_id = $invitado4->id;
                $turno142->numTurno = '2';
                $turno142->fechaTurno = '2022-08-24 17:26:52';
                $turno142->save();

        $seccion14->ultimoTurno = '2';
        $seccion14->save();

        $seccion15 = new Seccion();
        $seccion15->entidad_id = $entidad1->id;
        $seccion15->nombreSeccion = 'Comida para llevar';
        $seccion15->turnoActual = '0';
        $seccion15->ultimoTurno = '0';
        $seccion15->save();

                $turno151 = new Turno();
                $turno151->seccion_id = $seccion15->id;
                $turno151->invitado_id = $invitado1->id;
                $turno151->numTurno = '1';
                $turno151->fechaTurno = '2022-08-24 17:25:52';
                $turno151->save();

                $turno152 = new Turno();
                $turno152->seccion_id = $seccion15->id;
                $turno152->invitado_id = $invitado2->id;
                $turno152->numTurno = '2';
                $turno152->fechaTurno = '2022-08-24 17:26:41';
                $turno152->save();

                $turno153 = new Turno();
                $turno153->seccion_id = $seccion15->id;
                $turno153->invitado_id = $invitado5->id;
                $turno153->numTurno = '3';
                $turno153->fechaTurno = '2022-08-24 17:32:09';
                $turno153->save();

                $turno154 = new Turno();
                $turno154->seccion_id = $seccion15->id;
                $turno154->invitado_id = $invitado4->id;
                $turno154->numTurno = '4';
                $turno154->fechaTurno = '2022-08-24 17:34:45';
                $turno154->save();

                $turno155 = new Turno();
                $turno155->seccion_id = $seccion15->id;
                $turno155->invitado_id = $invitado6->id;
                $turno155->numTurno = '5';
                $turno155->fechaTurno = '2022-08-24 17:46:12';
                $turno155->save();

                $turno156 = new Turno();
                $turno156->seccion_id = $seccion15->id;
                $turno156->invitado_id = $invitado3->id;
                $turno156->numTurno = '6';
                $turno156->fechaTurno = '2022-08-24 17:52:51';
                $turno156->save();

        $seccion15->ultimoTurno = '6';
        $seccion15->save();

        ////////////////////////////////////////////////////////////////////DIA
        $user2 = new User();
        $user2->name = 'test2';
        $user2->email = 'test2@dia.com';
        $user2->password = bcrypt('test2');
        $user2->fullName = 'Encargado 2';
        $user2->dni = '11223344B';
        $user2->telefono = '999666222';
        $user2->domicilio = 'Calle B Numero 2';
        $user2->permissions = $permissions['disabledUser'];
        $user2->save();

        $entidad2 = new Entidad();
        $entidad2->user_id = $user2->id;
        $entidad2->nombreEntidad = 'Dia';
        $entidad2->direccionEntidad = 'Av. Boucau, 8, 14550 Montilla, Córdoba';
        $entidad2->horarioEntidad = "9:00h - 21:30h";
        $entidad2->nombreFiscal = "Dia SA";
        $entidad2->nif = "11223344D";
        $entidad2->url = "https://www.dia.es/";
        $entidad2->save();

        $seccion21 = new Seccion();
        $seccion21->entidad_id = $entidad2->id;
        $seccion21->nombreSeccion = 'Carnicería';
        $seccion21->turnoActual = '0';
        $seccion21->ultimoTurno = '0';
        $seccion21->save();

            $turno211 = new Turno();
            $turno211->seccion_id = $seccion21->id;
            $turno211->invitado_id = $invitado1->id;
            $turno211->numTurno = '1';
            $turno211->fechaTurno = '2022-08-24 17:25:52';
            $turno211->save();

            $turno212 = new Turno();
            $turno212->seccion_id = $seccion21->id;
            $turno212->invitado_id = $invitado2->id;
            $turno212->numTurno = '2';
            $turno212->fechaTurno = '2022-08-24 17:26:52';
            $turno212->save();

            $turno213 = new Turno();
            $turno213->seccion_id = $seccion21->id;
            $turno213->invitado_id = $invitado3->id;
            $turno213->numTurno = '3';
            $turno213->fechaTurno = '2022-08-24 17:26:58';
            $turno213->save();

            $turno214 = new Turno();
            $turno214->seccion_id = $seccion21->id;
            $turno214->invitado_id = $invitado4->id;
            $turno214->numTurno = '4';
            $turno214->fechaTurno = '2022-08-24 17:28:23';
            $turno214->save();

            $turno215 = new Turno();
            $turno215->seccion_id = $seccion21->id;
            $turno215->invitado_id = $invitado5->id;
            $turno215->numTurno = '5';
            $turno215->fechaTurno = '2022-08-24 17:43:12';
            $turno215->save();

        $seccion21->ultimoTurno = '5';
        $seccion21->save();

        $seccion22 = new Seccion();
        $seccion22->entidad_id = $entidad2->id;
        $seccion22->nombreSeccion = 'Pescadería';
        $seccion22->turnoActual = '0';
        $seccion22->ultimoTurno = '0';
        $seccion22->save();

                $turno221 = new Turno();
                $turno221->seccion_id = $seccion22->id;
                $turno221->invitado_id = $invitado1->id;
                $turno221->numTurno = '1';
                $turno221->fechaTurno = '2022-08-24 17:23:52';
                $turno221->save();

                $turno222 = new Turno();
                $turno222->seccion_id = $seccion22->id;
                $turno222->invitado_id = $invitado2->id;
                $turno222->numTurno = '2';
                $turno222->fechaTurno = '2022-08-24 17:26:52';
                $turno222->save();

                $turno223 = new Turno();
                $turno223->seccion_id = $seccion22->id;
                $turno223->invitado_id = $invitado3->id;
                $turno223->numTurno = '3';
                $turno223->fechaTurno = '2022-08-24 17:26:58';
                $turno223->save();

        $seccion22->ultimoTurno = '3';
        $seccion22->save();

        $seccion23 = new Seccion();
        $seccion23->entidad_id = $entidad2->id;
        $seccion23->nombreSeccion = 'Charcutería';
        $seccion23->turnoActual = '0';
        $seccion23->ultimoTurno = '0';
        $seccion23->save();

                $turno231 = new Turno();
                $turno231->seccion_id = $seccion23->id;
                $turno231->invitado_id = $invitado1->id;
                $turno231->numTurno = '1';
                $turno231->fechaTurno = '2022-08-24 17:25:52';
                $turno231->save();

                $turno232 = new Turno();
                $turno232->seccion_id = $seccion23->id;
                $turno232->invitado_id = $invitado2->id;
                $turno232->numTurno = '2';
                $turno232->fechaTurno = '2022-08-24 17:26:52';
                $turno232->save();

        $seccion23->ultimoTurno = '2';
        $seccion23->save();

        ////////////////////////////////////////////////////////////////////MEDIAMARKT
        $user3 = new User();
        $user3->name = 'test3';
        $user3->email = 'test3@mediamarkt.com';
        $user3->password = bcrypt('test3');
        $user3->fullName = 'Encargado 3';
        $user3->dni = '11223344C';
        $user3->telefono = '222007733';
        $user3->domicilio = 'Calle M Numero 3';
        $user3->permissions = $permissions['disabledUser'];
        $user3->save();

        $entidad3 = new Entidad();
        $entidad3->user_id = $user3->id;
        $entidad3->nombreEntidad = 'Mediamarkt';
        $entidad3->direccionEntidad = 'C.C. Los Patios de Azahara, 14005 Córdoba';
        $entidad3->horarioEntidad = "9:00h - 22:00h";
        $entidad3->nombreFiscal = "Mediamarkt SA";
        $entidad3->nif = "11223344M";
        $entidad3->url = "https://www.mediamarkt.es/";
        $entidad3->save();

        $seccion31 = new Seccion();
        $seccion31->entidad_id = $entidad3->id;
        $seccion31->nombreSeccion = 'Ordenadores';
        $seccion31->turnoActual = '0';
        $seccion31->ultimoTurno = '0';
        $seccion31->save();

                $turno311 = new Turno();
                $turno311->seccion_id = $seccion31->id;
                $turno311->invitado_id = $invitado1->id;
                $turno311->numTurno = '1';
                $turno311->fechaTurno = '2022-08-24 17:25:52';
                $turno311->save();

                $turno312 = new Turno();
                $turno312->seccion_id = $seccion31->id;
                $turno312->invitado_id = $invitado2->id;
                $turno312->numTurno = '2';
                $turno312->fechaTurno = '2022-08-24 17:26:52';
                $turno312->save();

                $turno313 = new Turno();
                $turno313->seccion_id = $seccion31->id;
                $turno313->invitado_id = $invitado3->id;
                $turno313->numTurno = '3';
                $turno313->fechaTurno = '2022-08-24 17:26:58';
                $turno313->save();

                $turno314 = new Turno();
                $turno314->seccion_id = $seccion31->id;
                $turno314->invitado_id = $invitado4->id;
                $turno314->numTurno = '4';
                $turno314->fechaTurno = '2022-08-24 17:28:23';
                $turno314->save();

                $turno315 = new Turno();
                $turno315->seccion_id = $seccion31->id;
                $turno315->invitado_id = $invitado5->id;
                $turno315->numTurno = '5';
                $turno315->fechaTurno = '2022-08-24 17:43:12';
                $turno315->save();

        $seccion31->ultimoTurno = '5';
        $seccion31->save();

        $seccion32 = new Seccion();
        $seccion32->entidad_id = $entidad3->id;
        $seccion32->nombreSeccion = 'Teléfonos';
        $seccion32->turnoActual = '0';
        $seccion32->ultimoTurno = '0';
        $seccion32->save();

                $turno321 = new Turno();
                $turno321->seccion_id = $seccion32->id;
                $turno321->invitado_id = $invitado1->id;
                $turno321->numTurno = '1';
                $turno321->fechaTurno = '2022-08-24 17:23:52';
                $turno321->save();

                $turno322 = new Turno();
                $turno322->seccion_id = $seccion32->id;
                $turno322->invitado_id = $invitado2->id;
                $turno322->numTurno = '2';
                $turno322->fechaTurno = '2022-08-24 17:26:52';
                $turno322->save();

                $turno323 = new Turno();
                $turno323->seccion_id = $seccion32->id;
                $turno323->invitado_id = $invitado2->id;
                $turno323->numTurno = '3';
                $turno323->fechaTurno = '2022-08-24 17:26:58';
                $turno323->save();

        $seccion32->ultimoTurno = '3';
        $seccion32->save();

        $seccion33 = new Seccion();
        $seccion33->entidad_id = $entidad3->id;
        $seccion33->nombreSeccion = 'Auriculares';
        $seccion33->turnoActual = '0';
        $seccion33->ultimoTurno = '0';
        $seccion33->save();

                $turno331 = new Turno();
                $turno331->seccion_id = $seccion33->id;
                $turno331->invitado_id = $invitado1->id;
                $turno331->numTurno = '1';
                $turno331->fechaTurno = '2022-08-24 17:25:52';
                $turno331->save();

                $turno332 = new Turno();
                $turno332->seccion_id = $seccion33->id;
                $turno332->invitado_id = $invitado6->id;
                $turno332->numTurno = '2';
                $turno332->fechaTurno = '2022-08-24 17:26:52';
                $turno332->save();

        $seccion33->ultimoTurno = '2';
        $seccion33->save();

        ////////////////////////////////////////////////////////////////////DREAMBEACH
        $user4 = new User();
        $user4->name = 'test4';
        $user4->email = 'test4@dreambeach.com';
        $user4->password = bcrypt('test4');
        $user4->fullName = 'Encargado 4';
        $user4->dni = '11223344C';
        $user4->telefono = '222007733';
        $user4->domicilio = 'Villaricos Calle D Numero 4';
        $user4->permissions = $permissions['disabledUser'];
        $user4->save();

        $entidad4 = new Entidad();
        $entidad4->user_id = $user4->id;
        $entidad4->nombreEntidad = 'Dreambeach';
        $entidad4->direccionEntidad = '04616 Villaricos, Almería';
        $entidad4->horarioEntidad = "19:00h - 6:30h";
        $entidad4->nombreFiscal = "Dreambeach SA";
        $entidad4->nif = "11223344F";
        $entidad4->url = "https://www.dreambeach.es/";
        $entidad4->save();

        $seccion41 = new Seccion();
        $seccion41->entidad_id = $entidad4->id;
        $seccion41->nombreSeccion = 'Escenario Techno Barra A';
        $seccion41->turnoActual = '0';
        $seccion41->ultimoTurno = '0';
        $seccion41->save();

                $turno411 = new Turno();
                $turno411->seccion_id = $seccion41->id;
                $turno411->invitado_id = $invitado2->id;
                $turno411->numTurno = '1';
                $turno411->fechaTurno = '2022-08-24 17:25:52';
                $turno411->save();

                $turno412 = new Turno();
                $turno412->seccion_id = $seccion41->id;
                $turno412->invitado_id = $invitado3->id;
                $turno412->numTurno = '2';
                $turno412->fechaTurno = '2022-08-24 17:26:52';
                $turno412->save();

                $turno413 = new Turno();
                $turno413->seccion_id = $seccion41->id;
                $turno413->invitado_id = $invitado4->id;
                $turno413->numTurno = '3';
                $turno413->fechaTurno = '2022-08-24 17:26:58';
                $turno413->save();

                $turno414 = new Turno();
                $turno414->seccion_id = $seccion41->id;
                $turno414->invitado_id = $invitado5->id;
                $turno414->numTurno = '4';
                $turno414->fechaTurno = '2022-08-24 17:28:23';
                $turno414->save();

                $turno415 = new Turno();
                $turno415->seccion_id = $seccion41->id;
                $turno415->invitado_id = $invitado6->id;
                $turno415->numTurno = '5';
                $turno415->fechaTurno = '2022-08-24 17:43:12';
                $turno415->save();

        $seccion41->ultimoTurno = '5';
        $seccion41->save();

        $seccion42 = new Seccion();
        $seccion42->entidad_id = $entidad4->id;
        $seccion42->nombreSeccion = 'Escenario Techno Barra B';
        $seccion42->turnoActual = '0';
        $seccion42->ultimoTurno = '0';
        $seccion42->save();

                $turno421 = new Turno();
                $turno421->seccion_id = $seccion42->id;
                $turno421->invitado_id = $invitado1->id;
                $turno421->numTurno = '1';
                $turno421->fechaTurno = '2022-08-24 17:23:52';
                $turno421->save();

                $turno422 = new Turno();
                $turno422->seccion_id = $seccion42->id;
                $turno422->invitado_id = $invitado3->id;
                $turno422->numTurno = '2';
                $turno422->fechaTurno = '2022-08-24 17:26:52';
                $turno422->save();

                $turno423 = new Turno();
                $turno423->seccion_id = $seccion42->id;
                $turno423->invitado_id = $invitado6->id;
                $turno423->numTurno = '3';
                $turno423->fechaTurno = '2022-08-24 17:26:58';
                $turno423->save();

        $seccion42->ultimoTurno = '3';
        $seccion42->save();

        $seccion43 = new Seccion();
        $seccion43->entidad_id = $entidad4->id;
        $seccion43->nombreSeccion = 'Escenario Techno Barra C';
        $seccion43->turnoActual = '0';
        $seccion43->ultimoTurno = '0';
        $seccion43->save();

                $turno431 = new Turno();
                $turno431->seccion_id = $seccion43->id;
                $turno431->invitado_id = $invitado2->id;
                $turno431->numTurno = '1';
                $turno431->fechaTurno = '2022-08-24 17:25:52';
                $turno431->save();

                $turno432 = new Turno();
                $turno432->seccion_id = $seccion43->id;
                $turno432->invitado_id = $invitado5->id;
                $turno432->numTurno = '2';
                $turno432->fechaTurno = '2022-08-24 17:26:52';
                $turno432->save();

        $seccion43->ultimoTurno = '2';
        $seccion43->save();

        $seccion44 = new Seccion();
        $seccion44->entidad_id = $entidad4->id;
        $seccion44->nombreSeccion = 'Escenario Alternativo Barra A';
        $seccion44->turnoActual = '0';
        $seccion44->ultimoTurno = '0';
        $seccion44->save();

                $turno441 = new Turno();
                $turno441->seccion_id = $seccion44->id;
                $turno441->invitado_id = $invitado3->id;
                $turno441->numTurno = '1';
                $turno441->fechaTurno = '2022-08-24 17:25:52';
                $turno441->save();

                $turno442 = new Turno();
                $turno442->seccion_id = $seccion44->id;
                $turno442->invitado_id = $invitado5->id;
                $turno442->numTurno = '2';
                $turno442->fechaTurno = '2022-08-24 17:26:52';
                $turno442->save();

        $seccion44->ultimoTurno = '2';
        $seccion44->save();

        $seccion45 = new Seccion();
        $seccion45->entidad_id = $entidad4->id;
        $seccion45->nombreSeccion = 'Escenario Alternativo Barra B';
        $seccion45->turnoActual = '0';
        $seccion45->ultimoTurno = '0';
        $seccion45->save();

                $turno451 = new Turno();
                $turno451->seccion_id = $seccion45->id;
                $turno451->invitado_id = $invitado1->id;
                $turno451->numTurno = '1';
                $turno451->fechaTurno = '2022-08-24 17:25:52';
                $turno451->save();

                $turno452 = new Turno();
                $turno452->seccion_id = $seccion45->id;
                $turno452->invitado_id = $invitado1->id;
                $turno452->numTurno = '2';
                $turno452->fechaTurno = '2022-08-24 17:26:52';
                $turno452->save();

        $seccion45->ultimoTurno = '2';
        $seccion45->save();
    }
}
