<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Frog.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate frog object
  $frog = new Frog($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $frog->color = $data->color;
  $frog->weight = $data->weight;
  $frog->length = $data->length;
  $frog->width = $data->width;
  $frog->sex = $data->sex;
  $frog->live_cycle = $data->live_cycle;
  $frog->description = $data->description;

  // Create frog
  if($frog->create()) {
    echo json_encode(
      array('message' => 'Frog Registered')
    );
  } else {
    echo json_encode(
      array('message' => 'Frog Not Registered')
    );
  }

