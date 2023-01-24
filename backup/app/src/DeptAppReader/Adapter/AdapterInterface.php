<?php

namespace App\Acme\DeptAppReader\Adapter;

interface AdapterInterface
{
    /**
     * Lade den Inhalt einer Seite
     *
     * @return string
     */
    public function getContent(): string;
}
