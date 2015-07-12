<?php

namespace KmeCnin\Bundle\FumbleManiaBundle\Controller;

use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CampaignsController extends FOSRestController
{
    /**
     * Get manager.
     * 
     * return Manager
     */
    public function getManager()
    {
        return $this->get('campaign_manager');
    }

    /**
     * List all campaigns.
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
        $offset = $paramFetcher->get('offset');
        $start = null == $offset ? 0 : $offset + 1;
        $limit = $paramFetcher->get('limit');
        
        $data = array('test' => 'lol');

        return $this->view($data, 200);
    }
}
