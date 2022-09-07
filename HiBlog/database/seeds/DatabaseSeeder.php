<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = '<p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. </p><p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.</p>';

    public function run() {

        DB::table('users')->insert([
            [
             'nome' => 'blog',
             'cognome' => 'blog',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3980901389',
             'username' => 'blogblog',
             'email' => 'blog@blog.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'utente',
             'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
  
            [
             'nome' => 'staff',
             'cognome' => 'staff',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3981111111',
             'username' => 'staffstaff',
             'email' => 'staff@staff.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'staff',
                'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],

            [
             'nome' => 'admin',
             'cognome' => 'admin',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3980901382',
             'username' => 'adminadmin',
             'email' => 'admin@admin.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'admin',
                'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],            
            
            [
             'nome' => 'mario',
             'cognome' => 'rossi',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3980901180',
             'username' => 'prova1',
             'email' => 'mario@rossi.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'utente',
                'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            [
             'nome' => 'luigi',
             'cognome' => 'verdi',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3980901181',
             'username' => 'prova2',
             'email' => 'luigi@verdi.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'utente',
                'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            [
             'nome' => 'Laura',
             'cognome' => 'Bianchi',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'femmina',
             'telefono' => '3980901182',
             'username' => 'prova3',
             'email' => 'laura@bianchi.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'utente',
                'visibile'=>'si',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
            
            [
             'nome' => 'luca',
             'cognome' => 'Bianchi',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3980901183',
             'username' => 'prova4',
                'visibile'=>'no',
             'email' => 'luca@bianchi.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'utente',
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('amicizie')->insert([
            [
            'id_richiedente_amicizia' => '1',
            'id_ricevente_amicizia' => '4',
            'accettata' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            
            [
            'id_richiedente_amicizia' => '1',
            'id_ricevente_amicizia' => '6',
            'accettata' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            
            
        ]);
        
    }

}
