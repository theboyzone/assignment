<?php

class Categories extends CSV_Model
{
    public function __construct()
    {
        parent::__construct(APPPATH . "../data/Categories.csv", "categoryId", "categories");
    }
}
