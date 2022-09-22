<?php

abstract class Model
{
    public static function find($id)
    {
        $table = static::tableName();

        $sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';
        echo "$sql <br>";
        //return $sql;
    }

    public function delete()
    {
        $table = static::tableName();

        $sql = 'DELETE FROM ' . $table . ' WHERE id = :id';
        echo "$sql <br>";
        //return $sql;
    }

    public function create()
    {
        $table = static::tableName();

        $data = get_object_vars($this);
        $property_list = array_keys($data);
        $values_list = array_map(function($item){
            return ':' . $item;
        }, $property_list);

        $sql = 'INSERT ' . $table . ' ('. implode(', ', $property_list) . ') VALUES (' . implode(', ', $values_list) . ')';
        echo "$sql <br>";
        //return $sql;
    }

    public function update()
    {
        $table = static::tableName();

        $data = get_object_vars($this);
        $data_array = array();
        foreach ($data as $value)
        {
            $value = key($data) . ' = :'. key($data);
            array_push($data_array, $value);
            next($data);
        }

        if(($key = array_search('id = :id',$data_array)) !== FALSE ) {
            unset($data_array[$key]);
        }

        $sql = 'UPDATE ' . $table . ' SET '. implode(', ', $data_array) . ' WHERE id = :id';
        echo "$sql <br>";
        //return $sql;
    }

    public function save()
    {
        if($this->inserted) {
            echo "Already exists.. Updating.. <br>";
            $this->update();
        } else {
            echo "Oh, something new.. creating.. <br>";
            $this->create();
            $this->inserted = true;
        }
    }

    abstract public static function tableName();
}

final class User extends Model
{
    public $id;
    public $name;
    public $email;
    public $inserted = false;

    public static function tableName()
    {
        return 'user';
    }
}

//$user = User::find(1);

$user1 = new User();
/*var_dump($user1->delete());
var_dump($user1->create());
var_dump($user1->update());*/
$user1->save();
$user1->save();
