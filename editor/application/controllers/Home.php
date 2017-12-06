<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$string_a = file_get_contents("../data/events.json");
    $json_a = json_decode($string_a, true);

    $string_b = file_get_contents("../data/visuals.json");
    $json_b = json_decode($string_b, true);

    $events = $json_a['events'];
    $events_length = count($events);

    $intro = $json_a['intro'];
    $intro_length = count($intro);

    $visuals = $json_b['visuals'];
    $visuals_length = count($visuals);

    $data = array(
      'content' => 'home',
      'events_c' => $events_length,
      'intro_c' => $intro_length,
      'visuals_c' => $visuals_length,
			'visuals' => $visuals
    );

    $this->load->view('template',$data);
	}

}
