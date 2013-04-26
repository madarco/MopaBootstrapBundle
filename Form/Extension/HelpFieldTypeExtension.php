<?php
namespace Mopa\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

class HelpFieldTypeExtension extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('help_inline', $options['help_inline']);
        $builder->setAttribute('help_block', $options['help_block']);
        $builder->setAttribute('help_label', $options['help_label']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['help_inline'] = $form->getAttribute('help_inline');
        $view->vars['help_block'] = $form->getAttribute('help_block');
        $view->vars['help_label'] = $form->getAttribute('help_label');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults( array(
            'help_inline' => null,
            'help_block' => null,
            'help_label' => null,
        ));
    }
    public function getExtendedType()
    {
        return 'field';
    }    
}