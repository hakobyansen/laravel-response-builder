<?php

namespace RB\Core;

interface IResponse
{
    public function getArray(): array;
    public function getResponse();
}