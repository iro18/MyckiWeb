<?php

namespace MyckiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PostType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('content', TextareaType::class, array(
            'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'bbcode' // Skip it if you want to use default theme
        )
            )) 
        ->add('title')
        ->add('titleSeo')
        ->add('published')
        ->add('datePublish')
        ->add('image', ImageType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyckiBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myckibundle_post';
    }


}
