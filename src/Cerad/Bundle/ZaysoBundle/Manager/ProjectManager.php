<?php
namespace Cerad\Bundle\ZaysoBundle\Manager;

class ProjectManager
{
    protected $em;
    protected $emName;
    protected $projectMetaData;
    
    public function __construct($em,$emName = null)
    {
        $this->em     = $em;
        $this->emName = $emName;
    }
    public function setProjectMetaData($data) { $this->projectMetaData = $data; }
    public function getProjectMetaData()      { return $this->projectMetaData; }
    
}
?>
