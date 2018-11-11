<?php

namespace Livro\Database;

final class Repository
{
    private $activeRecord; // classe manipulada pelo repositório

    function __construct($class)
    {
        $this->activeRecord = $class;
    }

    public function load(Criteria $criteria)
    {
        // instancia a instrução de SELECT
        $sql = "SELECT * FROM " . constant( $this->activeRecord . '::TABLENAME');

        // obtém a cláusula WHERE do objeto criteria
        if ($criteria) {
            $expression = $criteria->dump();

            if ($expression) {
                $sql .= ' WHERE ' . $expression;
            }
            
            // obtém as propriedades do critério
            $order = $criteria->getProperty('order');
            $limit = $criteria->getProperty('limit');
            $offset = $criteria->getProperty('offset');

            // Obtém a ordenação do SELECT
            if ($order) {
                $sql .= ' ORDER BY ' . $order;
            }

            if ($limit) {
                $sql .= ' LIMIT ' . $limit;
            }

            if ($offset) {
                $sql .= ' OFFSET ' . $offset;
            }
        }

        // Obtém transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra mensagem de log

            // executa a consulta no banco de dados;
            $result = $conn->query($sql);
            $results = array();

            if ($result) {
                // percorre os resultados da consulta, retornando um objeto
                while ($row = $result->fetchObject($this->activeRecord)) {
                    // armazena no array $results;
                    $results[] = $row;
                } 
            }

            return $results;

        } else {
            throw new Exception('Não Há Transação Ativa');
        }
    }

    public function delete(Criteria $criteria)
    {
        $expression = $criteria->dump();
        $sql = "DELETE FROM " . constant($this->activeRecord . '::TABLENAME');
        if ($expression) {
            $sql .= ' WHERE ' . $expression;
        }

        // Obtém transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra a mensagem de log
            $result = $conn->exec($sql); //executa instrução de DELETE
            return $result; 
        } else {
            throw new Exception('Não há transação ativa!!');
        }
    }

    public function count(Criteria $criteria)
    {
        $expression = $criteria->dump();
        $sql = "SELECT count(*) FROM " . constant($this->activeRecord . '::TABLENAME');
        if ($expression) {
            $sql .= ' WHERE ' . $expression;
        }

        // obtém transação ativa
        if ($conn = Transaction::get()) {
            Transaction::log($sql); // registra mensagem de log
            $result = $conn->query($sql); // executa instrução de SELECT
            if ($result) {
                $row = $result->fetch();
            }
            return $row[0]; // retorna o resultado
        } else {
            throw new Exception('Não há transação ativa!!');
        }
    }
}