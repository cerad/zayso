<?php
namespace Cerad\Bundle\ZaysoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cerad\Bundle\ZaysoBundle\Model\VolPlan;

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
    public function scheduleAction()
    {
        $tplData = array();
        return $this->render('@project/Schedule/index.html.twig', $tplData);
    }
    public function resultsAction()
    {
        $tplData = array();
        return $this->render('@project/Results/index.html.twig', $tplData);
    }
    public function volunteerPlanAction()
    {
        // Setup the project manager
        $projects       = $this->container->getParameter('cerad_zayso_projects');
        $projectKey     = $this->container->getParameter('cerad_zayso_project');
        $projectManager = $this->container->get         ('cerad_zayso.project.manager'); 
        $projectManager->setProjectmetaData($projects[$projectKey]);
        
        // The form
        $volPlan = new VolPlan($projects[$projectKey]['plan']);
        $formType = $this->container->get('cerad_zayso.vol_plan.formtype');
        $form = $this->createForm($formType,$volPlan);
        
        $tplData = array();
        $tplData['form'] = $form->createView();
        return $this->render('@project/Volunteer/plan.html.twig', $tplData);
    }
    public function adminAction()
    {
        $tplData = array();
        
        return $this->render('@project/Admin/index.html.twig', $tplData);
    }
}
?>
