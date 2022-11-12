<?php

namespace App\Http\Controllers;
use AmoCRM\Exceptions\AmoCRMoAuthApiException;

class AuthCRM extends Controller
{
    public function index()
    {
    $clientId = '0a00db67-0ee5-4dca-81fe-6d061fcc11bb';
    $clientSecret = 'qWCWog6MbrIe2XujfEQDCXSnuJyGutFBHusxXCxrUpTdM3MWt5caPVypAeXwj0su';
    $redirectUri = 'https://example.com';
    $code = 'def50200112ee477cd13512690a7704743612ae2f5fa49c6e243629917ab6f9d776514804b9a41d466cf38d3c93db3fc0e65809e6b6a0b2efb6ce2e3c6d4690490161573bd845bccdf16a9af1061dc65437d9d8b77ca3bed43bebba664000cd91863fda3cc4d584df3ef5d7e4d2e71d6a5c0ad9883f447c43a88b5451aa40f84adcf856ba2e95828a689118bfdccff6c608ef75f6b38ab81e04c121d62351b0c30044e5c541e7a76d8f1686b588b13c2d2b3550f154b24bfb6d94028381a3e1c27377899d099ce63ec32a889164df596ca00d664447cdbf74945aa3a67b1cda1c15151be880bf2b289ef3a4aa4f16186a0c9fe4a626dda14f7155ce7839460acbb37b6a380074b88e286a59990232f68c28ed20f4a588501cb138ea1ac6183383854f86a970ba1dcc3587fd10bf7ed8693a06e6464efe051c46fc9e00a261233e4e35ad5c909eb06025c9fefd7ec2043f16f712c607ee8f5c6173074dae23b0258ac740eda24faa992f5f3ea9745e06cb3c2969125f678b13484faf86a8e0df691df1209b71d942bbc101d66473c34ff72089847e3efabe7eb809ef1e4c8b43882312abc86b728ba9bd4e9f662d0ce142e7c743500e09558578349f5ae585269873af84653dde1e8028197d5416d33468a24a608';
    $apiClient = new \AmoCRM\Client\AmoCRMApiClient($clientId, $clientSecret, $redirectUri);
    $apiClient->setAccountBaseDomain('eososks.amocrm.ru');
        try {
            $accessToken = $apiClient->getOAuthClient()->getAccessTokenByCode($code);
        } catch (AmoCRMoAuthApiException $e) {
            dd($e);
        }
        $apiClient->setAccessToken($accessToken);
        $leadService = $apiClient->leads();
        $leadsCollection = $leadService->get();
        foreach ($leadsCollection as $lead) {
            Deal::create([
                'name' => $lead->name,
                'responsibleUserId' => $lead->responsibleUserId,
                'groupId' => $lead->groupId,
                'createdBy' => $lead->createdBy,
                'updatedBy' => $lead->updatedBy,
                'created_at' => $lead->createdAt,
                'updated_at' => $lead->updatedAt,
                'accountId' => $lead->accountId,
                'pipelineId' => $lead->pipelineId,
                'statusId' => $lead->statusId,
                'closedAt' => $lead->closedAt,
                'closestTaskAt' => $lead->closestTaskAt,
                'price' => $lead->price,
                'lossReasonId' => $lead->lossReasonId,
                'lossReason' => $lead->lossReason,
                'isDeleted' => $lead->isDeleted,
                'tags' => $lead->tags,
                'companyId' => $lead->company->id
            ]);
        }
        return view('index');
    }
}
