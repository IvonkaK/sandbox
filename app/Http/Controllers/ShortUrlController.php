<?php

namespace App\Http\Controllers;

use App\Helpers\RandomGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Interfaces\UrlShortInterface;
use Symfony\Component\HttpFoundation\Response;

class ShortUrlController extends Controller
{
    /**
     * @var UrlShortInterface
     */
    private $urlShortInterface;
    /**
     * @var RandomGenerator
     */
    private $randomGenerator;


    /**
     * @param UrlShortInterface $urlShortInterface
     * @param RandomGenerator $randomGenerator
     */
    public function __construct(UrlShortInterface $urlShortInterface, RandomGenerator $randomGenerator)
    {
        $this->urlShortInterface = $urlShortInterface;
        $this->randomGenerator = $randomGenerator;
    }

    # Encode link
    public function encode(Request $request)
    {
        # POST
        if ($request->isMethod('POST')) {

            # grab link input from the form
            $data['link'] = $request->input('link');
            if (!$data['link']) {
                return new JsonResponse('Link must be provided', Response::HTTP_NOT_FOUND);
            }

            # check if string provided is indeed a url
            $is_url = filter_var($data['link'], FILTER_VALIDATE_URL);
            if ($is_url === false) {
                return new JsonResponse('You must provide a valid link', Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            # generate short code
            $data['short'] = $this->randomGenerator->generateRandomString();
            if (!$data['short']) {
                return new JsonResponse('Short string could not be generated', Response::HTTP_NOT_FOUND);
            }

            # save above data in db
            $result_id = $this->urlShortInterface->saveAndGetId($data);
            # check if the result is successful
            if (is_int($result_id) === false) {
                return new JsonResponse('Data was not saved', Response::HTTP_BAD_REQUEST);
            }

            $short = $this->urlShortInterface->getShort($result_id);
            if (!$short) {
                return new JsonResponse('Short code could not be returned', Response::HTTP_NOT_FOUND);
            }
            # return json representation of short code
            return new JsonResponse($short, Response::HTTP_CREATED);
        }
        # GET
        return view('urlForm');
    }

    # decode short code
    public function decode($slug): JsonResponse
    {
        # search for short code in db
        $result_found = $this->urlShortInterface->getLink($slug);
        if (!$result_found) {
            return new JsonResponse('Link not found', Response::HTTP_NOT_FOUND);
        }
        # return json representation of long link
        return new JsonResponse($result_found, Response::HTTP_OK);
    }

    # for testing redirect
    public function handleRedirect($slug)
    {
        $result_found = $this->urlShortInterface->getLink($slug);
        if (!$result_found) {
            return new JsonResponse('Link not found', Response::HTTP_NOT_FOUND);
        }
        return redirect($result_found['link']);
    }
}
