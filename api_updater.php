<?php
/////////////////////////////////////////////////////////////////////////
//  api_updater.php v20140818b                                         //
//  takes a api-template and replaces nodes counter and                //
//  timestamp calculated from the nodes.json                           //
//  by Domnique Görsch <ff@dgoersch.info>                              //
//                                                                     //
//  This work is licensed under the Creative Commons                   //
//  Attribution-NonCommercial-ShareAlike 4.0 International License.    //
//  To view a copy of this license, visit                              //
//  http://creativecommons.org/licenses/by-nc-sa/4.0/.                 //
/////////////////////////////////////////////////////////////////////////
error_reporting(E_ALL ^ E_NOTICE);                                                           // suppress notices

$nodes_json_file   = "/var/customers/webs/ffmg/map/nodes.json";                              // source json file
$api_template_file = "/var/customers/webs/ffmg/api/ffmg-api.template";                       // source api template file
$api_target_file   = "/var/customers/webs/ffmg/api/ffmg-api.json";                           // target api file

$src_json = file_get_contents($nodes_json_file);                                             // load nodes.json
$src_arr  = json_decode($src_json,TRUE);                                                     // and convert to array

$counter  = 0;

foreach($src_arr['nodes'] as $node_arr) {                                                    // run through nodes
  $node = new stdClass();
  $node = json_decode(json_encode($node_arr), FALSE);

  if(!$node->flags->client) {                                                                // if node is not a client
    $counter++;                                                                              // count it
  }
}

$lastchange   = date("Y-m-d\TH:i:s").".0000";                                                // get date string

$api_template = file_get_contents($api_template_file);                                       // load api template
$api_content  = str_replace('%%NODESCOUNTER%%',$counter,$api_template);                      // replace nodes counter
$api_content  = str_replace('%%LASTCHANGE%%',$lastchange,$api_content);                      // and date string

file_put_contents($api_target_file,$api_content);                                            // output new api json

?>
