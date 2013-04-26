<?php
namespace Mopa\BootstrapBundle\Form\Extension;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

class AddinfoFieldTypeExtension extends AbstractTypeExtension
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAttribute('widget_prefix', $options['widget_prefix']);
        $builder->setAttribute('widget_suffix', $options['widget_suffix']);
        $builder->setAttribute('widget_remove_btn', $options['widget_remove_btn']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['widget_prefix'] = $form->getAttribute('widget_prefix');
        $view->vars['widget_suffix'] = $form->getAttribute('widget_suffix');
        $view->vars['widget_remove_btn'] = $form->getAttribute('widget_remove_btn');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
         $resolver->setDefaults( array(
            'widget_prefix' => null,
            'widget_suffix' => null,
            'widget_remove_btn' => null,
        ) );
    }
    public function getExtendedType()
    {
        return 'field';
    }
}