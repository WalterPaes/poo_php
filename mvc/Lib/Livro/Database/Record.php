<?php

namespace Livro\Database;

use Exception;

abstract class Record
{
    protected $data; // array contendo os dados do objeto

    public function __construct($id = NULL)
    {
        if ($id) { // Se o ID for informado
            // Carrega o objeto correspondente
            $object = $this->load($id);

            if ($object) {
                $this->fromArray($object->toArray());
            }

        }
    }

    public function __clone()
    {
        unset($this->data['id']);
    }

    public function __set($prop, $value)
    {
        if (method_exists($this, 'set_'.$prop)) {
            // executa o método set_<propriedade>
            call_user_func(array($this, 'set_' . $prop), $value);
        } else {
            if ($value === NULL) {
                unset($this->data[$prop]);
            } else {
                $this->data[$prop] = $value; // atribui o valor da propriedade
            }
        }
    }

    public function __get($prop)
    {
        if (method_exists($this, 'get_' . $prop)) {
            // executa o método get_<propriedade>
            return call_user_func(array($this, 'get_'.$prop));
        } else {
            if (isset($this->data[$prop])) {
                return $this->data[$prop];
            }
        }
    }

    public function __isset($prop)
    {
        return isset($this->data[$prop]);
    }

    private function getEntity()
    {
        $class = get_class($this);
        return constant("{$class}::TABLENAME");
    }

    public function fromArray($data)
    {
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function store()
    {
        $prepared = $this->prepare($this->data);

        // verifica se tem ID ou se existe na base de dados
        if (empty($this->data['id']) || (!$this->load($this->id))) {
            // incrementa o ID
            if (empty($this->data['id'])) {
                $this->id = $this->getLast() + 1;
                $prepare['id'] = $this->id;
            }

            // cria uma instrução de insert
            $sql = "INSERT INTO {$this->getEntity()}" . '(' . implode(', ', array_keys($prepared)) . ' )' .
               ' values ' .
               '(' . implode(', ', array_values($prepared)) . ')';
        
        } else {
            // monsta a string de UPDATE
            $sql = "UPDATE {$this->getEntity()}";
            if ($prepared) {
                foreach ($prepared as $column => $value) {
                    if ($column !== 'id') {
                        $set[] = "{$column} = {$value}";
                    }
                }
            }
            $sql .= ' SET ' . implode(', ', $set);
            $sql .= ' WHERE id=' . (int) $this->data['id'];
        }

        // obtém a transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql);
            $result = $conn->exec($sql);
            return $result;
        } else {
            throw new Exception("Não há transação ativa!!");  
        }
    }

    public function load($id)
    {
        // monta a instrução de SELECT
        $sql = "SELECT * FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $id;

        // Obtém transação ativa
        if ($conn = Transaction::get()) {
            // cria mensagem de log e executa a consulta
            Transaction::log($sql);
            $result = $conn->query($sql);

            // Se retornou algum dado
            if ($result) {
                // retorna os dados em forma de objeto
                $object = $result->fetchObject(get_class($this));
            }

            return $object;
        } else {
            throw new Exception('Não há transação ativa!!');
        }       
    }

    public function delete($id = NULL)
    {
        // o ID é o parâmetro ou a propriedade ID
        $id = $id ? : $this->id;

        // monta a string UPDATE
        $sql = "DELETE FROM {$this->getEntity()}";
        $sql .= ' WHERE id=' . (int) $this->data['id'];

        // Obtém transação ativa
        if ($conn = Transaction::get()) {
            // Faz o log e executa o SQL
            Transaction::log($sql);
            $result = $conn->exec($sql);
            return $result;
        } else {
            throw new Exception('Não há transação ativa!!');
        }
    }

    public static function find($id)
    {
        $classname = get_called_class();
        $ar = new $classname;
        return $ar->load($id);
    }

    private function getLast()
    {
        if ($conn = Transaction::get()) {
            $sql = "SELECT max(id) FROM {$this->getEntity()}";

            // cria log e executa a instrução SQL
            Transaction::log($sql);
            $result = $conn->query($sql);

            // Retorna os dados do banco
            $row = $result->fetch();
            return $row[0];
        } else {
            throw new Exception('Não há transação ativa!!');
        }
    }
    
    public function prepare($data)
    {
        $prepared = array();
        foreach ($data as $key => $value) {
            if (is_scalar($value)) {
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    public function escape($value)
    {
        if (is_string($value) && (!empty($value))) {
            // adiciona \ em aspas
            $value = addslashes($value);
            return "'$value'";
        } else if (is_bool($value)) {
            return $value ? 'TRUE' : 'FALSE';
        } else if ($value !== '') {
            return $value;
        } else {
            return 'NULL';
        }
    }
}