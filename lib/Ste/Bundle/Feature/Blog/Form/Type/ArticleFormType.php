<?php

namespace Ste\BlogBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Ste\BlogBundle\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Submit Button
        $context = $options['context'];
        if ('creation' === $context) {
            $labelSubmit = 'post.action.create';
        } else {
            $labelSubmit = 'post.action.update';
        }

        // Date
        $date = $options['article']->getDate();
        if(empty($date)) {
            $date = new \DateTime();
        }

        $builder
            ->add('title', TextType::class)
            ->add('author',TextType::class)
            ->add('description', TextType::class)
            ->add('text', TextareaType::class)
            ->add('date', DateTimeType::class, array (
                'data' => $date
            ))
            ->add('valider', SubmitType::class, [
                'label' => $labelSubmit
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class,
            'translation_domain' => 'ste_blog',
            'article' => null,
            'context' => null
        ));
    }
}