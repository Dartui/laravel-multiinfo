<?php
namespace Dartui\Multiinfo\Contracts;

interface Response
{
    public function getStatusCode();

    public function getReasonPhrase();

    public function getBody();

    public function getContents();

    public function getCode();

    public function getDescription();

    public function hasError();

    public function getError();

    public function toArray();
}
