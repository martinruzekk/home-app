<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Company;
use App\Entity\Item;
use App\Entity\ItemType;
use App\Form\AddItemType;
use App\Form\AddItemTypeType;
use App\Form\ItemInfoType;
use App\Repository\CompanyRepository;
use App\Repository\CountryRepository;
use App\Repository\ItemRepository;
use App\Repository\ItemTypeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response as BrowserKitResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/inventory", name="inventory.")
 */
class InventoryController extends AbstractController
{
    private $countryRepository;
    private $companyRepository;
    private $allCountries;
    private $allCompanies;
    private $itemTypeRepository;


    public function __construct(CountryRepository $countryRepository, CompanyRepository $companyRepository, ItemTypeRepository $itemTypeRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->companyRepository = $companyRepository;
        $this->itemTypeRepository = $itemTypeRepository;

        $this->allCountries = $this->countryRepository->findAll();
        $this->allCompanies = $this->companyRepository->findAll();
    }

    /**
     * @Route("/addCompany", name="addCompany")
     */
    public function addCompany(Request $request, CountryRepository $countryRepository)
    {
        if ($request->isXmlHttpRequest()) {
            $addCompanyName = $request->request->get('addCompanyName');
            $addCompanyStreet = $request->request->get('addCompanyStreet');
            $addCompanyStreetNumber1 = $request->request->get('addCompanyStreetNumber1');
            $addCompanyStreetNumber2 = $request->request->get('addCompanyStreetNumber2');
            $addCompanyCity = $request->request->get('addCompanyCity');
            $addCompanyZip = $request->request->get('addCompanyZip');
            $addCompanyCountry = $request->request->get('addCompanyCountry');
            $addCompanyLogoURL = $request->request->get('addCompanyLogoURL');
            $addCompanyType = $request->request->get('addCompanyType');
            $addCompanyUrl = $request->request->get('addCompanyUrl');
            $addCompanyDesc = $request->request->get('addCompanyDesc');
            $addCompanyEmail = $request->request->get('addCompanyEmail');

            $country = $countryRepository->findOneBy(['name' => $addCompanyCountry]);
            $company = new Company;
            $address = new Address;

            if (trim(str_contains($addCompanyZip, ' '))) {
                $addCompanyZip = str_replace(' ', '', $addCompanyZip);
            }

            $address->setCity($addCompanyCity);
            $address->setCountry($country);
            $address->setStreet($addCompanyStreet);
            $address->setStreetNumber((int)$addCompanyStreetNumber1);
            $address->setStreetNumber2((int)$addCompanyStreetNumber2);
            $address->setZipcode($addCompanyZip);

            $company->setAddressId($address);
            $company->setDescription($addCompanyDesc);
            $company->setEmail($addCompanyEmail);
            $company->setLogoUrl($addCompanyLogoURL);
            $company->setName($addCompanyName);
            $company->setType($addCompanyType);
            $company->setWebsiteUrl($addCompanyUrl);

            $result = "";
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->persist($company);
            if (!$em->flush()) {
                $result = "success";
            } else {
                $result = "fail";
            }

            $defaultContext = [
                AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                    return $object->getId();
                },
            ];
            $encoders = [
                new JsonEncoder()
            ];
            $normalizers = [
                new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)
            ];
            $serializer = new Serializer($normalizers, $encoders);
            $response = $serializer->serialize($result, 'json');
            return new JsonResponse($response, 200, [], true);
        }

        return new JsonResponse([
            'type' => "error",
            'message' => 'Not an AJAX request'
        ], 500);
    }

    /**
     * @Route("/searchItems", name="searchItems")
     */
    public function searchItems(Request $request, CountryRepository $countryRepository, ItemRepository $itemRepository)
    {
        if ($request->isXmlHttpRequest()) {
            /*$addCompanyName = $request->request->get('addCompanyName');
            $addCompanyStreet = $request->request->get('addCompanyStreet');
            $addCompanyStreetNumber1 = $request->request->get('addCompanyStreetNumber1');
            $addCompanyStreetNumber2 = $request->request->get('addCompanyStreetNumber2');
            $addCompanyCity = $request->request->get('addCompanyCity');
            $addCompanyZip = $request->request->get('addCompanyZip');
            $addCompanyCountry = $request->request->get('addCompanyCountry');
            $addCompanyLogoURL = $request->request->get('addCompanyLogoURL');
            $addCompanyType = $request->request->get('addCompanyType');
            $addCompanyUrl = $request->request->get('addCompanyUrl');
            $addCompanyDesc = $request->request->get('addCompanyDesc');
            $addCompanyEmail = $request->request->get('addCompanyEmail');*/

            /*$country = $countryRepository->findOneBy(['name' => $addCompanyCountry]);
            $company = new Company;
            $address = new Address;*/

            $query = $request->request->get('query');
            $items = $itemRepository->searchItems($query);
            $result = [];

            foreach ($items as $item) {
                array_push($result, [
                    $item->getName(),
                    $item->getUser(),
                    $item->getItemType(),
                    $item->getItemImages(),
                    $item->getId(),
                    $item->getCompany(),
                    $item->getAmmount()
                ]);
            }

            $defaultContext = [
                AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                    return $object->getId();
                },
            ];
            $encoders = [
                new JsonEncoder()
            ];
            $normalizers = [
                new ObjectNormalizer(null, null, null, null, null, null, $defaultContext)
            ];
            $serializer = new Serializer($normalizers, $encoders);
            $response = $serializer->serialize($result, 'json');
            return new JsonResponse($response, 200, [], true);
        }

        return new JsonResponse([
            'type' => "error",
            'message' => 'Not an AJAX request'
        ], 500);
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $newItem = new Item();
        $addItemForm = $this->createForm(AddItemType::class, $newItem);

        $addItemForm->handleRequest($request);
        if ($addItemForm->isSubmitted()) {
            $newItem->setUser($this->getUser());
            $newItem->setItemType($this->itemTypeRepository->findOneBy(['name' => $request->request->get('add_item')['item_type']]));
            $newItem->setCompany($this->companyRepository->findOneBy(['name' => $request->request->get('add_item')['company']]));

            $em->persist($newItem);
            $em->flush();
        }
        $newItemType = new ItemType();
        $addItemTypeForm = $this->createForm(AddItemTypeType::class, $newItemType);
        $addItemTypeForm->handleRequest($request);

        if ($addItemTypeForm->isSubmitted()) {
            $em->persist($newItemType);
            $em->flush();
        }

        $addItemInfo = $this->createForm(ItemInfoType::class);

        return $this->render('inventory/index.html.twig', [
            'controller_name' => 'InventoryController',
            'allCountries' => $this->allCountries,
            'allCompanies' => $this->allCompanies,
            'addItemForm' => $addItemForm->createView(),
            'addItemType' => $addItemTypeForm->createView(),
            'addItemInfo' => $addItemInfo->createView()
        ]);
    }

    /**
     * @Route("/companies", name="companies")
     */
    public function companies(): Response
    {

        return $this->render('inventory/companies.html.twig', [
            'controller_name' => 'InventoryController',
            'allCompanies' => $this->allCompanies,
            'allCountries' => $this->allCountries
        ]);
    }
}
