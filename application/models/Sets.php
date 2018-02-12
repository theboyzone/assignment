<?php

class Sets extends CSV_Model
{
    public function __construct()
    {
        parent::__construct(APPPATH . "../data/Sets.csv", "setId", "sets");
    }
}
