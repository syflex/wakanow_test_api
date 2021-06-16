<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Frog.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate frog object
  $frog = new Frog($db);

  // Get ID
  $frog->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get frog
  $frog->read_single();

  // Create array
  $frog_arr = array(
    'id' => $frog->id,
    'number' => $frog->number,
    'color' => $frog->color,
    'weight' => $frog->weight,
    'length' => $frog->length,
    'width' => $frog->width,
    'sex' => $frog->sex,
    'live_cycle' => $frog->live_cycle,
    'description' => $frog->description,
  );

  // Make JSON
  print_r(json_encode($frog_arr));