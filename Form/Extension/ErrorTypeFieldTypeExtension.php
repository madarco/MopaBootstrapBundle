<?php
namespace Mopa\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

 
class ErrorTypeFieldTypeExtension extends AbstractTypeExtension
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder->setAttribute('field_error_type', $options['field_error_type']);
        $builder->setAttribute('error_delay', $options['error_delay']);
	}
	
	public function buildView(FormView $view, FormInterface $form, array $options)
	{
	    $view->vars['field_error_type'] = $form->getAttribute('field_error_type');
	    $view->vars['error_delay'] = $form->getAttribute('error_delay');
	}
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
         $resolver->setDefaults( array(
            'field_error_type' => false,
            'error_delay'=>false
        ));
    }
	public function getExtendedType()
	{
		return 'field';
	}
}