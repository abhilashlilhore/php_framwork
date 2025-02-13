<?php 

namespace app\core\form;



Class Field{



    public const TYPE_TEXT='text';
    public const TYPE_PASSWORD='password';
    public const TYPE_NUMBER='number';
    public $model;
    public $attribute;
    public $type;
    public function __construct( $model, $attribute)
    {

        $this->type=self::TYPE_TEXT;
        $this->model=$model;
        $this->attribute=$attribute;
        
    }

    public function __toString()
    {
        
       return sprintf('<div class="form-group mx-sm-3 mb-2">
                <label for="" class="sr-only">%s</label>
                <input type="%s" class="form-control %s"  name="%s" value="%s" placeholder="Enter %s">
                  <div class="invalid-feedback">
                %s
                </div>
            </div>',
            
                $this->attribute,
                $this->type,
                $this->model->hasError($this->attribute)?' is-invalid ':'',
                $this->attribute,
                $this->model->{$this->attribute},
                $this->attribute,
                $this->model->getFirstError($this->attribute)??'',

            );
    }
    public function passwordField(){

        $this->type=self::TYPE_PASSWORD;

        return $this;
        
    }



}