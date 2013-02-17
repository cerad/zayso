<?php
namespace Cerad\Bundle\ZaysoBundle\Model;

class VolPlan
{

    public $attending;
    public $refereeing;
    public $assessing;
    public $refLevelCR;
    public $refLevelAR;
    public $reqAssess;
    public $coaching;
    public $volunteering;
    public $playing;
    public $tshirt;
    public $shuttle;
    public $hotel;
    
    public function __construct($meta = null)
    {
        if (!$meta) return;
        
        foreach($meta as $name => $item)
        {
            if (isset($item['default'])) $default = $item['default'];
            else                         $default = null;
            
            $this->$name = $default;
        }
    }
}
?>
