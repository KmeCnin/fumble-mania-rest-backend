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
     * HTTP  | [GET] /campaigns
     * ROUTE | get_campaigns
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return array
     */
    public function getCampaignsAction()
    {
        return $this->view($this->getManager()->get(), 200);
    }

    /**
     * Get one campaign from given id.
     * HTTP  | [GET] /campaigns/{id}
     * ROUTE | get_campaign
     *
     * @ApiDoc(
     *   output = "KmeCnin\Bundle\FumbleManiaBundle\Entity\Campaign",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the note is not found"
     *   }
     * )
     *
     * @param int
     *
     * @return Campaign
     * 
     * @throws NotFoundHttpException when note not exist
     */
    public function getCampaignAction(Campaign $campaign)
    {
        return $this->view($campaign, 200);
    }

    /**
     * Creates a new campaign from the submitted data.
     * HTTP  | [POST] /campaigns
     * ROUTE | post_campaigns
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

            return $this->redirect($this->generateUrl('get_campaign'), array('id' => $campaign->getId()));
        }

        return $this->view(array('form' => $form), 400);
    }

    /**
     * Presents the form to use to create a new campaign.
     * HTTP  | [GET] /campaigns/new
     * ROUTE | new_campaigns
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
