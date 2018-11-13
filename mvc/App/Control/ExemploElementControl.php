<?php

use Livro\Control\Page;
use Livro\Widgets\Base\Element;

class ExemploElementControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        $div = new Element('div');
        $div->style = 'text-align:center;';
        $div->style .= 'font-weight: bold;';
        $div->style .= 'font-size: 14pt';

        $p = new Element('p');
        $p->add('Sport CLub Internacional');
        $div->add($p);

        $img = new Element('img');
        $img->src = 'http://lh3.googleusercontent.com/-ZELdD-cdVg0/Vamen6G4VnI/AAAAAAAADvs/QSGIvWyJ_t0/s714/internacional.png';
        $div->add($img);

        $p = new Element('p');
        $p->add('Clube do Povo do Rio Grande do Sul');
        $div->add($p);

        echo $div;

        parent::add($div);
    }
}