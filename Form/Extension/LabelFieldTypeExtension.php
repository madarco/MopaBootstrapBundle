<?php
namespace Mopa\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

 
class LabelFieldTypeExtension extends AbstractTypeExtension
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder->setAttribute('label_attr', $options['label_attr']);
        $builder->setAttribute('label_render', $options['label_render']);
	}
	
	public function buildView(FormView $view, FormInterface $form, array $options)
	{
	    $view->vars['label_attr'] = $form->getConfig()->getAttribute('label_attr');
	    $view->vars['label_render'] = $form->getConfig()->getAttribute('label_render');
	}
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults( array(
            'label_attr' => array(),
            'label_render' => true,
        ) );
    }
	public function getExtendedType()
	{
		return 'field';
	}
}