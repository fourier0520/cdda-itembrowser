<?php

class Monster implements Robbo\Presenter\PresentableInterface
{
    use MagicModel;

    protected $data;

    public function load($data)
    {
        $this->data = $data;
    }

    public function loadDefault($id)
    {
        $data = json_decode('{"id":"'.$id.'","name":"'.$id.'?","type":"invalid"}');
        $this->load($data);
    }

    public function getPresenter()
    {
        return new Presenters\Monster($this);
    }

    public function getMinDamage()
    {
        return $this->melee_dice+$this->melee_cut;
    }

    public function getMaxDamage()
    {
        return ($this->melee_dice*$this->melee_dice_sides)+$this->melee_cut;
    }

    public function getAvgDamage()
    {
        return ($this->minDamage+$this->maxDamage)/2;
    }

    public function getSpecies()
    {
        return (array) $this->data->species;
    }

    public function getFlags()
    {
        if(!isset($this->data->flags))
            return array();
        return (array) $this->data->flags;
    }

    public function getId()
    {
        return $this->data->id;
    }

    public function matches($search) 
    {
        $search = trim($search);
        if($search == "")
            return false;

        return stristr($this->data->name, $search);
    }
}
