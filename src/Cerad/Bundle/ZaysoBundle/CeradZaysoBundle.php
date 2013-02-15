<?php
namespace Cerad\Bundle\ZaysoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

use Cerad\Bundle\ZaysoBundle\DependencyInjection\ZaysoExtension;

class CeradZaysoBundle extends Bundle
{   
    public function getContainerExtension()
    {
        if (!$this->extension) return $this->extension;
        
        return new ZaysoExtension();
    }
}   
?>
