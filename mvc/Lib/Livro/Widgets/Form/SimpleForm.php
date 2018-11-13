<?php

namespace Livro\Widgets\Form;

class SimpleForm
{
    private $name, $action, $fields, $title;

    public function __construct($name)
    {
        $this->name = $name;
        $this->fields = array();
        $this->title = '';
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function addField($label, $name, $type, $value, $class = '')
    {
        $field = array(
            'label' => $label,
            'name'  => $name,
            'type'  => $type,
            'value' => $value,
            'class' => $class
        );

        array_push($this->fields, $field);
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function show()
    {
        echo "<h3>{$this->title}</h3>";
        echo "<form method='POST' action='{$this->action}'>";

        if ($this->fields) {
            foreach ($this->fields as $field) {
                echo "<div>";
                echo "<label>{$field['label']}</label>";
                echo "<div>";
                echo "<input type='{$field['type']}' name='{$field['name']}' value='{$field['value']}' class='{$field['class']}'>";
                echo "</div>";
                echo "</div>";
            }
        }
        
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";
    }
}