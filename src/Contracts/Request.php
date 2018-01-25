<?php
namespace Dartui\Multiinfo\Contracts;

interface Request
{
    public function send();

    public function action();

    public function client();

    public function url();

    public function parameters();

    public function toArray();
}
