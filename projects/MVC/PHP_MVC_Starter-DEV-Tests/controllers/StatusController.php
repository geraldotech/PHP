<?php
class StatusController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        header('Content-Type: application/json');
        echo json_encode(['status' => 'ok', 'message' => 'This is a test response from the StatusController.']);
    }
}