<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends CI_Controller {

	public function index()
	{
		$string_a = file_get_contents("../data/events.json");
    $json_a = json_decode($string_a, true);

    $intro = $json_a['intro'];
    $intro_length = count($intro);

		$string_b = file_get_contents("../data/visuals.json");
    $json_b = json_decode($string_b, true);

    $visuals = $json_b['visuals'];

    $data = array(
      'content' => 'intro',
      'intro_c' => $intro_length,
      'intros' => $intro,
			'visuals' => $visuals
    );

    $this->load->view('template',$data);
	}

}
