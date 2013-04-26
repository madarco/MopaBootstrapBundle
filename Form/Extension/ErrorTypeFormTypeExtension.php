<?php
namespace Mopa\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

 
class ErrorTypeFormTypeExtension extends AbstractTypeExtension
{
    private $error_type;
    
    public function __construct(array $options){
        $this->error_type = $options['error_type'];
    }
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder->setAttribute('error_type', $options['error_type']);
	}
	
	public function buildView(FormView $view, FormInterface $form, array $options)
	{
	    $view->vars['error_type'] = $form->getAttribute('error_type');
	}
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'error_type' => $this->error_type,
        ));
    }
	public function getExtendedType()
	{
		return 'form';
	}
}