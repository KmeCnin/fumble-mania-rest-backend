<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Controller;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View;
use KmeCnin\Bundle\FumbleManiaBundle\Entity\Campaign;
use KmeCnin\Bundle\FumbleManiaBundle\Form\CampaignType;
use KmeCnin\Component\Manager\ManagerInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CampaignsController extends FOSRestController
{
    /**
     * Get manager.
     * 
     * @return ManagerInterface
     */
    public function getManager()
    {
        return $this->get('campaign_manager');
    }

    /**
     * List all campaigns.
     * [GET] /campaigns
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing entries.")
     * @QueryParam(name="limit", requirements="\d+", default="5", description="How many entries to return.")
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getCampaignsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        return $this->view($this->getManager()->get(), 200);
    }

    /**
     * Creates a new campaign from the submitted data.
     * [POST] /campaigns
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "KmeCnin\Bundle\FumbleManiaBundle\Form\CampaignType",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     400 = "Returned when the form has errors"
     *   }
     * )
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|RouteRedirectView
     */
    public function postCampaignsAction(Request $request)
    {
        $campaign = new Campaign();
        $form = $this->createForm(new CampaignType(), $campaign);
        $form->submit($request);
        if ($form->isValid()) {
            $this->getManager()->set($campaign);

            return $this->routeRedirectView('get_campaign', array('id' => $campaign->id));
        }

        return $this->view(array(
            'form' => $form
        ), 200);
    }

    /**
     * Presents the form to use to create a new campaign.
     * [GET] /campaigns/new
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return FormTypeInterface
     */
    public function newCampaignAction()
    {
        return $this->view($this->createForm(new CampaignType()), 200);
    }
}
