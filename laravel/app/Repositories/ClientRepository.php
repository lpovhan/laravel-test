<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version August 8, 2021, 7:32 pm UTC
 */
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value'
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
        return Client::class;
    }


    /**
     * Update model record for given id
     *
     * @param  array  $data
     * @return Builder|Model
     */
    public function updateAll(array $data)
    {
        $result = [];
        foreach ($data as $key => $value) {
            $query = $this->model->newQuery();
            $model = $query->where('key', 'like', $key)->first();
            $model->update(["value" => $value]);
            $result[] = $model;
        }
        return $result;
    }

    /**
     * @param $key
     * @return Builder|Model|object|null
     */
    public function findByKey($key)
    {
        $query = $this->model->newQuery();

        return $query->where('key', '=', $key)->first();
    }

    /**
     * @param  array  $keys
     * @return Builder[]|Collection
     */
    public function findByKeys(array $keys)
    {
        $query = $this->model->newQuery();
        return $query->whereIn('key', $keys)->get();
    }
}
