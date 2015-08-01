<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Controller;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View;
use FOS\UserBundle\Model\UserManagerInterface;
use KmeCnin\Bundle\FumbleManiaBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UsersController extends FOSRestController
{
    /**
     * Get manager.
     * 
     * @return UserManagerInterface
     */
    public function getManager()
    {
        return $this->get('fos_user.user_manager');
    }

    /**
     * Get the user currently authenticated.
     * HTTP  | [GET] /self
     * ROUTE | get_self
     *
     * @ApiDoc(
     *   output = "KmeCnin\Bundle\FumbleManiaBundle\Entity\User",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the user is not found"
     *   }
     * )
     *
     * @return User
     * 
     * @throws NotFoundHttpException when user not exist
     */
    public function getSelfAction()
    {
        return $this->view($this->get('security.context')->getToken()->getUser(), 200);
    }

    /**
     * Get one user from given id.
     * HTTP  | [GET] /users/{id}
     * ROUTE | get_user
     *
     * @ApiDoc(
     *   output = "KmeCnin\Bundle\FumbleManiaBundle\Entity\User",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the user is not found"
     *   }
     * )
     *
     * @param int
     *
     * @return User
     * 
     * @throws NotFoundHttpException when user not exist
     */
    public function getUserAction(User $id)
    {
        return $this->view($id, 200);
    }
}
