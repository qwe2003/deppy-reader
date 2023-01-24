<?php

namespace App\Acme\DeptAppReader\Entity;

class ReaderEntity {

    /**
     * @var string
     */
    private $html = '';

    /**
     * @var array
     */
    private $error = [];

    /**
     * @var array
     */
    private $proccedSteps = [];


    /**
     * Get the value of html
     *
     * @return  string
     */ 
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set the value of html
     *
     * @param  string  $html
     *
     * @return  self
     */ 
    public function setHtml(string $html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get the value of error
     *
     * @return  array
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @param  array  $error
     *
     * @return  self
     */ 
    public function setError(array $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the value of proccedSteps
     *
     * @return  array
     */ 
    public function getProccedSteps()
    {
        return $this->proccedSteps;
    }

    /**
     * Set the value of proccedSteps
     *
     * @param  array  $proccedSteps
     *
     * @return  self
     */ 
    public function setProccedSteps(array $proccedSteps)
    {
        $this->proccedSteps = $proccedSteps;

        return $this;
    }
}