<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text')
        ->add('email', 'email')
        ->add('subject', 'text')
        ->add('message', 'textarea')
        ->add('recaptcha', 'ewz_recaptcha', [
            'attr' => [
                'options' => [
                    'theme' => 'light',
                    'type' => 'image',
                ],
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $collectionConstraint = new Collection(array(
        'name' => array(
            new NotBlank(array('message' => 'Name should not be blank.')),
            new Length(array('min' => 2)),
        ),
        'email' => array(
            new NotBlank(array('message' => 'Email should not be blank.')),
            new Email(array('message' => 'Invalid email address.')),
        ),
        'subject' => array(
            new NotBlank(array('message' => 'Subject should not be blank.')),
            new Length(array('min' => 3)),
        ),
        'message' => array(
            new NotBlank(array('message' => 'Message should not be blank.')),
            new Length(array('min' => 5)),
        ),
    ));

        $resolver->setDefaults(array(
        'constraints' => $collectionConstraint,
    ));
    }

    public function getName()
    {
        return 'contact';
    }
}
