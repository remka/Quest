<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index()
	{
		$string_a = file_get_contents("../data/events.json");
    $json_a = json_decode($string_a, true);

    $events = $json_a['events'];
    $events_length = count($events);

    $data = array(
      'content' => 'events',
      'events_c' => $events_length,
      'events' => $events
    );

    $this->load->view('template',$data);
	}

	public function new() {
		$data = array(
			'content' => 'events_new'
		);
		$this->load->view('template',$data);
	}

}
