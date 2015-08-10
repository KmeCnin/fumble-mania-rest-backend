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
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManagerInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class JwtController extends FOSRestController
{
    /**
     * Get refreshed token from given valid one.
     * HTTP  | [GET] /refresh
     * ROUTE | get_refresh
     *
     * @ApiDoc(
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return string JSON Web Token
     */
    public function getRefreshAction()
    {
        /** @var JWTManagerInterface $manager */
        $manager = $this->get('lexik_jwt_authentication.jwt_manager');

        return $this->view($manager->create($this->get('security.context')->getToken()->getUser()), 200);
    }
}
