<?php
namespace Cerad\Bundle\ZaysoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchFormType extends AbstractType
{
    public function getName() { return 'cerad_zayso_search'; }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('param1','text');
    }
}
?>
