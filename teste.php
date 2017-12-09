<?php
class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

  

    /**  Not a magic method, just here for example.  */
    /*public function getHidden()
    {
        return $this->hidden;
    }*/
}


echo "<pre>\n";

$obj = new PropertyTest;

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
//echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";
?>