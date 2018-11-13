<?php
namespace Livro\Widgets\Base;

class Element
{
    protected $tagname;
    protected $properties;
    protected $children;

    public function __construct($name)
    {
        $this->tagname = $name;
    }

    public function __set($name, $value)
    {
        // armazena os valores atribuídos ao array properties
        $this->properties[$name] = $value;
    }

    public function __get($name)
    {
        // Retorna os valores atribuídos ao array properties
        return isset($this->properties[$name]) ? $this->properties[$name] : NULL;
    }

    public function add($child)
    {
        $this->children[] = $child;
        //array_push($this->children, $child);
    }

    public function show()
    {
        $this->open(); // Abre a Tag
        echo "\n";
        if ($this->children) {
            foreach ($this->children as $child) {
                if (is_object($child)) {
                    $child->show();
                } else if ((is_string($child)) or (is_numeric($child))) {
                    echo $child;
                }
            }
        }

        $this->close(); // fecha a tag
    }

    private function open()
    {
        // Exibe a tag de abertura
        echo "<{$this->tagname}";
        if ($this->properties) {
            // Percorre as propriedades
            foreach ($this->properties as $name => $value) {
                if (is_scalar($value)) {
                    echo " {$name} = \"{$value}\"";
                }
            }
        }
        echo ">";
    }

    private function close()
    {
        echo "</{$this->tagname}>\n";
    }

    public function __toString()
    {
        ob_start();
        $this->show();
        $content = ob_get_clean();
        return $content;
    }
}