<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version August 8, 2021, 3:25 am UTC
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function findByLogin($login)
    {
        $query = $this->model->newQuery();
        return $query->where('login', '=', $login)->first();
    }

    /**
     * @param  array  $data
     * @return Model
     */
    public function create($data)
    {
        return parent::create([
            'login' => $data['login'],
            'password' => bcrypt($data['password'])
        ]);
    }
}
