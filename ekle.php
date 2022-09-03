<?php
require 'db.php';

switch ($_GET['mode']){
    case 'insert':
        if($_POST){

            $namee = $_POST['namee'];
            $surname = $_POST['surname'];
            $messagee = $_POST['messagee'];
            
            if($namee != "" && $surname != "" && $messagee != ""){
                $sorgu = $db->prepare('INSERT INTO test SET
                namee = ?,
                surname = ?,
                messagee = ?');
            $ekle = $sorgu->execute([
                $namee, $surname, $messagee
            ]);
            
                if($ekle){
                    echo 'tamamdır';
                }
            }else {
                echo 'Lütfen Boş Alan Bırakmayın';
            }
            
            }
    break;  
    
    case 'get':
        $veri = $db->query("SELECT * FROM test")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($veri as $key => $value){
            echo '<div class="list">'.$value['namee'].' '.$value['surname'].'  '.$value['messagee'].'</div> <br>';
        }
    break;    
}

