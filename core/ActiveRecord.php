<?php

namespace Core;

use Exception;
use PDO;
use PDOException;
use Core\Database;

abstract class ActiveRecord
{
    private $content;
    protected $table = NULL;
    protected $idfield = NULL;
    protected $logtimestamp;

    protected $columns;    
    protected $where;  
    protected $order;    
    protected $statement;
    protected $limit;    
    protected $offset;
    public $error;
 
    public function __construct()
    {
        if (!is_bool($this->logtimestamp)) {
            $this->logtimestamp = TRUE;
        }
         if ($this->table == NULL) {
            $this->table = strtolower(get_class($this));
        }
        if ($this->idfield == NULL) {
            $this->idfield = 'id';
        }
    }
 
    public function __set($parameter, $value)
    {
        $this->content[$parameter] = $value;
    }
 
    public function __get($parameter)
    {
        return $this->content[$parameter];
    }
 
    public function __isset($parameter)
    {
        return isset($this->content[$parameter]);
    }
 
    public function __unset($parameter)
    {
        if (isset($parameter)) {
            unset($this->content[$parameter]);
            return true;
        }
        return false;
    }
 
    private function __clone()
    {
        if (isset($this->content[$this->idfield])) {
            unset($this->content[$this->idfield]);
        }
    }
 
    public function toArray()
    {
        return $this->content;
    }
 
    public function fromArray(array $array)
    {
        $this->content = $array;
    }
 
    public function toJson()
    {
        return json_encode($this->content);
    }
 
    public function fromJson(string $json)
    {
        $this->content = json_decode($json);
    }

    private function format($value)
    {
        if (is_string($value) && !empty($value)) {
            return "'" . addslashes($value) . "'";
        } else if (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        } else if ($value !== '') {
            return $value;
        } else {
            return "NULL";
        }
    }
    
    private function convertContent()
    {
        $newContent = array();
        foreach ($this->content as $key => $value) {
            if (is_scalar($value)) {
                $newContent[$key] = $this->format($value);
            }
        }
        return $newContent;
    }

    public function select($columns): ActiveRecord
    {
        $this->columns = $columns;
        return $this;
    }        

    public function where($where): ActiveRecord
    {
        $this->where = $where;
        return $this;
    }       

    public function order($order): ActiveRecord
    {
        $this->order = $order;
        return $this;
    }       

    public function limit($limit): ActiveRecord
    {
        $this->limit = $limit;
        return $this;
    }           

    public function findById($id)
    {
        $class = get_called_class();
        $idfield = (new $class())->idfield;
        $table = (new $class())->table;
     
        $sql = 'SELECT * FROM ' . (is_null($table) ? strtolower($class) : $table);
        $sql .= ' WHERE ' . (is_null($idfield) ? 'id' : $idfield);
        $sql .= " = {$id};";

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject($class);        
    }

    public function find($id = null)
    {
        $class = get_called_class();
        $idfield = (new $class())->idfield;
        $table = (new $class())->table;
        $columns = $this->columns;
        $where = $this->where;
        $order = $this->order;
        $limit = $this->limit;
    
        $sql = "SELECT " . (is_null($columns) ? "*" : $columns) . " FROM " . (is_null($table) ? strtolower($class) : $table);
        $sql .= !is_null($where) ? " WHERE " . implode(' AND ', $where) : " WHERE id = {$id}";
        $sql .= !is_null($order) ? " ORDER BY {$order}" : " ORDER BY id DESC";
        $sql .= !is_null($limit) ? " LIMIT {$limit}" : "";

        try {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if(!empty($id)) {
                return $stmt->fetchObject($class);                     
            } else {
                return $stmt->fetchAll(PDO::FETCH_CLASS, $class);                
            }
        } catch (PDOException $exception) {
            $this->error = $exception;
            return null;
        }

    }   

    public function first()
    {
        $class = get_called_class();
        $idfield = (new $class())->idfield;
        $table = (new $class())->table;
        $columns = $this->columns;
        $where = $this->where;
    
        $sql = "SELECT " . (is_null($columns) ? "*" : $columns) . " FROM " . (is_null($table) ? strtolower($class) : $table);
        $sql .= is_null($where) ? "" : " WHERE " . implode(' AND ', $where);

        try {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchObject($class);                

        } catch (PDOException $exception) {
            $this->error = $exception;
            return null;
        }

    }       
    
    public function all()
    {
        $class = get_called_class();
        $idfield = (new $class())->idfield;
        $table = (new $class())->table;
        $columns = $this->columns;
        $where = $this->where;
        $order = $this->order;
        $limit = $this->limit;
     
        $sql = "SELECT " . (is_null($columns) ? "*" : $columns) . " FROM " . (is_null($table) ? strtolower($class) : $table);
        $sql .= !is_null($order) ? " ORDER BY {$order}" : " ORDER BY id DESC";
        $sql .= !is_null($limit) ? " LIMIT {$limit}" : "";

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);        
    }        

    public function save(): ?Int
    {
        $newContent = $this->convertContent();
        try {        
            $pdo = Database::getInstance();

            if (isset($this->content[$this->idfield])) {
                $sets = array();
                foreach ($newContent as $key => $value) {
                    if ($key === $this->idfield)
                        continue;
                    $sets[] = "{$key} = {$value}";
                }
                $sql = "UPDATE {$this->table} SET " . implode(', ', $sets) . " WHERE {$this->idfield} = {$this->content[$this->idfield]};";
                $this->statement = $sql;
                $stmt = $pdo->prepare($this->statement);
                $stmt->execute();                  
            } else {
                $sql = "INSERT INTO {$this->table} (" . implode(', ', array_keys($newContent)) . ') VALUES (' . implode(',', array_values($newContent)) . ');';
                $this->statement = $sql;
                $stmt = $pdo->prepare($this->statement);
                $stmt->execute();  
                $this->id = $pdo->lastInsertId();
            }  
            return $this->id;
        } catch (PDOException $exception) {
            $this->error = $exception;
            return null;
        }

    }

    public function count(): Int
    {
        $class = get_called_class();
        $idfield = (new $class())->idfield;
        $table = (new $class())->table;
        $columns = $this->columns;
        $where = $this->where;
     
        $sql = "SELECT COUNT(id) FROM " . (is_null($table) ? strtolower($class) : $table);
        $sql .= is_null($where) ? "" : " WHERE " . implode(' AND ', $where);

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $total = (int)$stmt->fetchColumn(0);
        return $total;
    }     
    
    public function delete()
    {
        if (isset($this->content[$this->idfield])) {
            $sql = "DELETE FROM {$this->table} WHERE {$this->idfield} = {$this->content[$this->idfield]};";
            $this->statement = $sql;
            try {
                $pdo = Database::getInstance();
                $stmt = $pdo->prepare($this->statement);
                $stmt->execute();  
                return true;
            } catch (PDOException $exception) {
                $this->error = $exception;
                return null;
            }
        }
    }  
    
    public function query($rawquery)
    {
        try {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare($rawquery);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $exception) {
            $this->error = $exception;
            return null;
        }        
    }    


}