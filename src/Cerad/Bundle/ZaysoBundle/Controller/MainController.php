<?php
namespace Cerad\Bundle\ZaysoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $tplData = array();
        
        return $this->render('CeradZaysoBundle::index.html.twig', $tplData);
    }
    public function welcomeAction()
    {
        $tplData = array();
        
        return $this->render('@project/welcome.html.twig', $tplData);
    }
    public function textAlertsAction()
    {
        $tplData = array();
        
        return $this->render('@project/text_alerts.html.twig', $tplData);
    }
    public function contactAction()
    {
        $tplData = array();
        
        return $this->render('@project/contact.html.twig', $tplData);
    }
    public function classesAction()
    {
        $tplData = array();
        
        return $this->render('@project/classes.html.twig', $tplData);
    }
   public function adminAction()
    {
        $tplData = array();
        
        return $this->render('@project/Admin/index.html.twig', $tplData);
    }
}
?>
