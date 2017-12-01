<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$string = file_get_contents("../data/events.json");
    $json_a = json_decode($string, true);

    $data = array(
      'content' => 'home',
      'string' => $string,
      'json' => $json_a
    );

    $this->load->view('template',$data);
	}

}
