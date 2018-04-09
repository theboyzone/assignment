<?php
class Accessory extends Entity
{
    // Accessory Id
    private $id;
    // Accessory name
    private $name;
    // Accessory image path
    private $img;
    // Accessory comfort
    private $comfort;
    // Accessory speed
    private $speed;
    // Accessory professionality
    private $professionality;
    // Category id (FK)
    private $categoryId;


    public function setName($value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('An name must have a value');
        }
        if (strlen($value) > 10){
          throw new Exception('A Name cannot be longer than 10 characters');
        }
        $this->name = $value;
        return $this;
    }

    public function setImage($value)
    {
      if (empty($value)) {
          throw new InvalidArgumentException('Image must have a value');
      }
        $this->image = $value;
        return $this;
    }
    public function setComfort($value)
    {
      if (empty($value)) {
          throw new InvalidArgumentException('comfort must have a value');
      }
      if (!is_numeric($value)){
        throw new Exception('Comfort must be numeric');
      }
      if ($value > 10)
      {
        throw new Exception('Comfort cannot be larger than 10');
      }
      if ($value < 0)
      {
        throw new Exception('Comfort cannot be negative');
      }
        $this->comfort = $value;
        return $this;
    }
    public function setSpeed($value)
    {
      if (empty($value)) {
          throw new InvalidArgumentException('Speed must have a value');
      }
      if (!is_numeric($value)){
        throw new Exception('speed must be numeric');
      }
      if ($value > 10)
      {
        throw new Exception('speed cannot be larger than 10');
      }
      if ($value < 0)
      {
        throw new Exception('speed cannot be negative');
      }
        $this->speed = $value;
        return $this;
    }
    public function setProfessionality($value)
    {
      if (empty($value)) {
          throw new InvalidArgumentException('professionality must have a value');
      }
      if (!is_numeric($value)){
        throw new Exception('professionality must be numeric');
      }
      if ($value > 10)
      {
        throw new Exception('professionality cannot be larger than 10');
      }
      if ($value < 0)
      {
        throw new Exception('professionality cannot be negative');
      }
        $this->professionality = $value;
        return $this;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getComfort()
    {
        return $this->comfort;
    }
    public function getSpeed()
    {
        return $this->speed;
    }
    public function getProfessionality()
    {
        return $this->professionality;
    }
}
