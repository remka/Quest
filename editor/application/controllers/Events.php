<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function index() {

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

	public function new($event_id = null) {

		$string_a = file_get_contents("../data/events.json");
    $json_a = json_decode($string_a, true);

		$events = $json_a['events'];

		$string_b = file_get_contents("../data/visuals.json");
    $json_b = json_decode($string_b, true);

    $visuals = $json_b['visuals'];

		$data = array(
			'content' => 'events_new',
			'events' => $events,
			'visuals' => $visuals,
			'event_id' => $event_id
		);
		$this->load->view('template',$data);
	}

}
