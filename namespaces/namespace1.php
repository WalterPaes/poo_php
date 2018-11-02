<?php

// declaração
namespace Application;
class Form{}

namespace Components;
class Form{}

// utilização
var_dump(new Form); // Ex 1
var_dump(new \Components\Form); // Ex 2
var_dump(new \Application\Form); // Ex 3
var_dump(new \SplFileInfo('/etc/shaddow')); // Ex 4
var_dump(new SplFileInfo('/etc/shaddow')); // Ex 5