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

	public function create() {

		// write single json file
		$stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
		$request = json_decode($stream_clean, true);
		$file_name = $request['id'];
		$pretty_json = json_encode($request, JSON_PRETTY_PRINT);
		file_put_contents('data/'.$file_name.'.json', $pretty_json);

    $files_array = array();
		$dir = './data';
    $scanned_directory = array_diff(scandir($dir), array('..', '.', '.DS_Store'));
		$answer = json_encode($scanned_directory);
		//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		header('Content-Type: application/json');
		//echo json_encode($answer);
		print_r($answer);
	}

}
