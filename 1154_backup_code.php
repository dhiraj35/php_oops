<?php 
    $GLOBALS['_VSERV']['ALL_SPC_ZONES']=$zones;

    if($GLOBALS['_VSERV']['SPC']){
                foreach($GLOBALS['_VSERV']['ALL_SPC_ZONES'] as $spcZoneId){
                    $dbZoneid = MAX_cacheGetZoneIdFromKey($spcZoneId, null);
                    if(empty($dbZoneid)){ continue; }
                    if(!isset($GLOBALS['_VSERV']['ZONE']['LINKED_CAMPAIGNS'][$dbZoneid['zoneid']])){
                        $allLinkedCampaigns = MAX_cacheGetZoneLinkedCampaigns($dbZoneid['zoneid'],$cacheContentId);
                        if(!empty($cacheContentId)) {
                            $linkedCampaigns          = MAX_cacheGetZoneLinkedCampaigns($dbZoneid['zoneid'], 0);
                            $allLinkedCampaigns       = array_replace_recursive($allLinkedCampaigns, $linkedCampaigns);
                        }
                        foreach($allLinkedCampaigns as $batchId =>$allCampaignData){
                           foreach($allCampaignData as $campaignId =>$campaignData){
                               $GLOBALS['_VSERV']['ZONE']['LINKED_CAMPAIGNS'][$dbZoneid['zoneid']][$batchId][$campaignId]=$campaignData;                           
                            }
                        }               
                    }
                }
            } else {
    
                $this->request['adspots']   = $vmaxHelper->getCampaigns();
    
                foreach($response['data'] as $adspotId => $campaignAdDetails){
                        if(!isset($campaignAdDetails['campaignid']) || empty($campaignAdDetails['campaignid'])){
                            $this->error = 7; //campaign id is not present
                            $this->errorDesc = 'Campaign id is not present'; //campaign id is not present
                            $this->setLoggingDetails();
                            return null;
                        }
                        if(!isset($this->aCampaigns[$adspotId][$campaignAdDetails['campaignid']])){
                            continue;
                        }
                        if($response['depth'] == 'ad'){
                            if(!empty($campaignAdsList[$adspotId][$campaignAdDetails['campaignid']]['ad_list'])){
                                continue;
                            }
                            if(!isset($campaignAdDetails['adid']) || empty($campaignAdDetails['adid'])){
                                $this->error = 8; // depth is ad and ad is not set or array is blank
                                $this->errorDesc = 'Depth is ad and ad id is not present'; //ad id is not present
                                $this->setLoggingDetails();
                                return null;
                            }
                            $campaignAdsList[$adspotId][$campaignAdDetails['campaignid']]['ad_list']                    = $campaignAdDetails['adid'];
                        }
                        $campaignOrderListArr[$adspotId][$campaignAdDetails['campaignid']]                              = 1;
                        $this->aCampaigns[$adspotId][$campaignAdDetails['campaignid']]['third_party_selection_log'] = $campaignAdDetails['log'];
                    }
    
                    if(!empty($campaignAdsList)){
                    foreach($this->aCampaigns as $adspotId => $campData){
                        foreach($campData as $campaignId => $details){
                            $adIds        = array_keys($details['ad_list']);
                            $diffArrayIds = array();
                            if(!empty($campaignAdsList[$adspotId][$campaignId])){
                                $diffArrayIds = array_diff($adIds, array(
                                $campaignAdsList[$adspotId][$campaignId]['ad_list']));
                            }
                            if(!empty($diffArrayIds)){
                                foreach($diffArrayIds as $key => $bannerid){
                                    unset($this->aCampaigns[$adspotId][$campaignId]['ad_list'][$bannerid]);
                                    unset($details['ad_list'][$bannerid]);
                                    continue;
                                }
                            }
                            $this->aCampaigns[$adspotId][$campaignId]['third_party_selection_log'] = $campaignAdsList[$adspotId][$campaignId]['third_party_selection_log'];
                        }
                    }
                }
    
                public function setCampaigns($allZoneLinkedCampData, $batchArray){
            foreach($allZoneLinkedCampData  as $zoneId => $campaigns){
                foreach($batchArray AS $batchId) {
                    if(!empty($campaigns[$batchId])) {
                        foreach($campaigns[$batchId] AS $campaignData) {
                            if(!isset($GLOBALS['_VSERV']['ZONE']['DISQUALIFY_CAMPAIGNS'][$campaignData['campaignid']])){
                                if(empty($campaignData['attributes'])) {
                                    $campaignData['attributes'] = (object) array();
                                }
                                $campaignData['selectionstage'] = 'qualified';
                                if($GLOBALS['_VSERV']['ZONE']['BATCH']['batch_id'] != $batchId){
                                   $campaignData['selectionstage'] = 'queued';
                                }
                                $this->campaigns[$zoneId]['campaigns'][] = $campaignData;
                            }
                        }
                    }
                }
            }
            
        }
    
    
        adselect.php
        $GLOBALS['_VSERV']['ZONE']['DISQUALIFY_CAMPAIGNS'][]=$campaignId;