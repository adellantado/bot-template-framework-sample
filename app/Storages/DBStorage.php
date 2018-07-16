<?php


namespace App\Storages;

use App\UserData;
use BotMan\BotMan\Interfaces\StorageInterface;
use Illuminate\Support\Collection;

class DBStorage implements StorageInterface
{

    public function save(array $data, $key)
    {
        $userdata = UserData::firstOrNew([
            'key' => $key,
        ], [
            'key' => $key,
        ]);

        $userdata->value = json_encode($data);
        $userdata->save();
    }

    public function get($key)
    {
        $data = UserData::where('key', $key)->first();
        if ($data) {
            return Collection::make(json_decode($data->value, true));
        }
        return Collection::make([]);
    }

    public function delete($key)
    {
        UserData::where('key', $key)->delete();
    }

    public function all()
    {
        return UserData::all()->pluck('value', 'key')->toArray();
    }

}