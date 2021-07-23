<?php

use App\Core\Controller;
use Hidehalo\Nanoid\Client;

class UserController extends Controller {

    public function insert($data) {
        $nanoId = new Client();
        $data['secondary_id'] = $nanoId->generateId($size = 8);
        $insert = $this->model('UserModel')->insert($data);
        echo json_encode([
            'success' => $insert > 0
        ]);
    }
}

