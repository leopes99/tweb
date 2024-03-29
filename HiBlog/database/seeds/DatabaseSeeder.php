<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

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
                'visibile'=>'no',
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
                'visibile'=>'no',
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
            
            [
             'nome' => 'staff2',
             'cognome' => 'staff2',               
             'data_nascita' => date("Y-m-d"),
             'genere' => 'maschio',
             'telefono' => '3981111311',
             'username' => 'staffstaff2',
             'email' => 'staff2@staff.it',
             'password' => Hash::make('0UXH4k3H'),
             'role' => 'staff',
                'visibile'=>'no',
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
        
        DB::table('blog')->insert([
            [
            'user_id'=> "1",    
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'nomeblog'=>'Roma',
            'tema'=>'Informazioni',
            'descrizione'=>"In questo blog si discute dei migliori posti per mangiare a Roma",
            'immagine'=>'roma.jpg',
            ],
            
            [
            'user_id'=> "1",    
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'nomeblog'=>'Matematica facile',
            'tema'=>'Didattica',
            'descrizione'=>"Questo blog può essere utilizzato per la risoluzione di problemi facili",
            'immagine'=>'matematica.jpg',
            ], 
            
            [
            'user_id'=> "4",    
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'nomeblog'=>'Percorsi Gran Sasso',
            'tema'=>'Escursioni',
            'descrizione'=>"Questo blog discute di tutti i percorsi da fare al Gran Sasso assieme ai rifugi che si possono trovare.",
            'immagine'=>'montagna.jpg',
            ], 
            
            
        ]);
        
        DB::table('post')->insert([
            [
            'user_id' => '1',
            'id_blog' => '1',
            'contenuto_post' => "Vi consiglio di andare al Ristorante Il Boncompagni",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            [
            'user_id' => '1',
            'id_blog' => '1',
            'contenuto_post' => "Non mi son trovato molto bene nell' Osteria degli Avvocati",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            [
            'user_id' => '6',
            'id_blog' => '1',
            'contenuto_post' => "Niente male la Gelateria Il Dolce Sorriso",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            
            [
            'user_id' => '1',
            'id_blog' => '2',
            'contenuto_post' => "La funzione è una relazione tra 2 insiemi di A e B.",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            
            [
            'user_id' => '6',
            'id_blog' => '3',
            'contenuto_post' => "Consiglio di fare un salto al Rifugio Franchetti, che si trova vicino alla sella dei due corni del Gran Sasso.",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")],
            
            
            
            
        ]);
        
    }

}
