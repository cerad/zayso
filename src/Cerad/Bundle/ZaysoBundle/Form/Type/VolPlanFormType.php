<?php
namespace Cerad\Bundle\ZaysoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VolPlanFormType extends AbstractType
{
    protected $manager = null;
    protected $name    = null;
    
    public function getName() { return $this->name; }
    
    public function __construct($name, $manager = null)
    {
        $this->name    = $name;
        $this->manager = $manager;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
    //        'data_class' => 'Cerad\TournBundle\Entity\OfficialPlans'
        ));
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builderName = $builder->getName();
        
        $meta = $this->manager->getProjectMetaData();
        $items = $meta['plan']; //[$builderName];
        
        foreach($items as $name => $item)
        {
            $isChoice = false;
            
            switch($item['type'])
            {
                case 'radio':
                    $isChoice = true;
                    $expanded = true;
                    $multiple = false;
                    $attr = array('class' => 'radio-medium');
                    break;
                
                case 'select':
                    $isChoice = true;
                    $expanded = false;
                    $multiple = false;
                    $attr = array();
                    break;
                
                case 'text':
                    
                    $attr = array();
                    
                    if (isset($item['size'])) $attr['size'] = $item['size'];
                    
                    $builder->add($name,'text',array(
                        'label'    => $item['label'],
                        'required' => false,
                        'attr'     => $attr,
                    ));
                    break;
                   
            }
            if ($isChoice) {
            $builder->add($name,'choice',array(
                'label'       => $item['label'],
                'required'    => false,
                'empty_value' => false,
                'choices'     => $item['choices'],
                'expanded'    => $expanded,
                'multiple'    => $multiple,
                'attr'        => $attr,
            ));}
        }
    }
}
?>
