<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    protected $table ='users';
    protected $primaryKey ='id';
    protected $DBGroup ='default';
    protected $allowedFields = ['oauth_id',	'name',	'email', 'profile_img',	'created_at', 'updated_at'];


}