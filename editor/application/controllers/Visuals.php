<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visuals extends CI_Controller {

	public function index()
	{
    $string_b = file_get_contents("../data/visuals.json");
    $json_b = json_decode($string_b, true);

    $visuals = $json_b['visuals'];
    $visuals_length = count($visuals);

    $data = array(
      'content' => 'visuals',
      'visuals_c' => $visuals_length,
      'visuals' => $visuals
    );

    $this->load->view('template',$data);
	}

}
