<?php

namespace App\Controller;

use App\Entity\SigesUser;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * Page de création d'un utillisateur
     * @param Request $request
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function registration(Request $request,  UserPasswordEncoderInterface $encoder)
    {
        $useraut= new SigesUser();
        $form= $this->createForm(RegistrationType::class, $useraut);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager= $this->getDoctrine()->getManager();



            //Verification si une image a été ajoutée
            if ($form['picture']->getData() == "") {
                //Encodage du Mot de passe
                $datenais=$useraut->getBirthdate()->format('Y-m-d');


                $hashpwd=$encoder->encodePassword($useraut, $useraut->getPassword());
                $useraut->setPassword($hashpwd);
                $useraut->setBirthdate(\DateTime::createFromFormat('Y-m-d', $datenais));
                $manager->persist($useraut);
                $manager->flush();
                $this->addFlash('success', 'Compte crée avec succès');
                return $this->redirectToRoute('security_login');
            } else {
                $datenais=$useraut->getBirthdate()->format('Y-m-d');
                // Recuperation de l'image et changement de nom de l'image
                $picture= $form['picture']->getData();
                $picturename= md5(uniqid()).'.'.$picture->guessExtension();
                $extensionsAutorisees = array('jpg', 'JPG', 'jpeg', 'JPEG');

                // recuperation de la taille de l'image et verification de la taille et de l'extension
                $picturesize = $picture->getClientSize();
                if (!in_array($picture->guessExtension(), $extensionsAutorisees)) {
                    $form->get('picture')->addError(
                        new FormError(
                            "Extension  du fichier incorrect. Votre image doit être au format(
                                 \"jpg\", \"JPG\",\"jpeg\", \"JPEG\") !"
                        )
                    );
                } elseif ($picturesize > 500000) {
                    $form->get('picture')->addError(
                        new FormError(
                            "La taille de votre photo doit être inferieure à 500 Ko"
                        )
                    );
                } else {
                    //téléchargement de l'image et enregistrement de l'utilisateur
                    $picture->move($this->getParameter('upload_destination'), $picturename);
                    $hashpwd=$encoder->encodePassword($useraut, $useraut->getPassword());
                    $useraut->setPassword($hashpwd);
                    $useraut->setPicture($picturename);
                    $useraut->setBirthdate(\DateTime::createFromFormat('Y-m-d', $datenais));
                    $manager->persist($useraut);
                    $manager->flush();
                    $this->addFlash('success', 'Compte crée avec succès');
                    return $this->redirectToRoute('security_login');
                }
            }
        }
        return $this->render(
            'security/registration.html.twig',
            array(
                'form'=>$form->createView(),
                'current_menu'=>'register'
            )
        );
    }



    /**
     * Page de Connexion
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        return $this->render('security/login.html.twig', [
            'error' =>$authenticationUtils->getLastAuthenticationError(),
            'last_username' =>$authenticationUtils->getLastUsername(),
            'current_menu'=>'login'

        ]);
    }


    /**
     * Redirection des utilisateurs
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirectuser(Request $request)
    {

        $userprofile= $this->getUser();
         $ananow = date('Y');
         $anabefore = $ananow - 1;
         $anacad = $anabefore . '-' . $ananow;

        $request->getSession()->set('anacad', $anacad);

        $auth = $this->container->get('security.authorization_checker');
        if ($auth->isGranted('ROLE_ENS')) {

            $deadline='2019-08-15 00:00:00';
            $request->getSession()->set('deadline', $deadline);
            if ($userprofile->getPassword()== '$2y$13$wV/Zn9NRh3D6ts7q/MA8i.6Wcb.si01/tZzYfrMFtCE3LiO/gpL7.') {
                return $this->redirectToRoute('security_updpwd');
            }
            if($userprofile->getUpdprofil()!=1){
                return $this->redirectToRoute('security_updprofil');
            }

            return $this->redirectToRoute('siges_dashboardteacher');
        }

    }















    /**
     * Page de Déconnexion
     * @return Response
     */
    public function logout()
    {
        return $this->redirectToRoute('security_login');
    }






}
