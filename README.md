ff-json-tools
=============
Collection of scripts to work and tamper with ff-related json files (ie. created by the [ffmap-backend](https://github.com/ffruhr/ffmap-backend)).  
  
_This work is licensed under the Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License.
To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-sa/4.0/._

#### api_updater.php

Tiny PHP script to autoupdate the api file for the [freifunk-api](http://freifunk.net/blog/2013/12/die-freifunk-api/).

It counts the nodes which are not clients in nodes.json and replace %%NODESCOUNTER%% and %%LASTCHANGE%% (in the template) with the calculated values.

There are 3 vars you have to change for your needs:  
  `$nodes_json_file` nodes.json where to count the nodes from  
  `$api_template_file`  template for the api file  
  `$api_target_file`  file which will be created with the calculated values  


#### nodes_filter.php

Little PHP script to filter nodes.json used by [ffmap-d3](https://github.com/ffruhr/ffmap-d3).

It takes the nodes.json created by the [ffmap-backend](https://github.com/ffruhr/ffmap-backend), parse it and take all legacy nodes, all nodes where the name match the filter, their client nodes and links to the target nodes.json.  
With the filtered nodes.json you can create maps that represent your community like [Freifunk Mönchengladbach](http://map.freifunk-moenchengladbach.de/graph.html) (which is part of the domain "Ruhrgebiet").

There are 3 vars you have to change for your needs:  
  `$src_url` source json file (output from ffmap-backend)  
  `$json_file` target json file (where ffmap-d3 reads from)  
  `$filters_arr[]` array of filter strings (matched if string is _at the beginning_ of the nodes name)  


#### nodes_merger.php

Little PHP script to merge nodes.jsons from different domains used by [ffmap-d3](https://github.com/ffruhr/ffmap-d3).

It takes the nodes.jsons from several domains created by the [ffmap-backend](https://github.com/ffruhr/ffmap-backend), parse them and join them together into one nodes.json with all nodes, links and clients.
With the merged nodes.json you can create a map that represent all domains.

There are 2 vars you have to change for your needs:  
  `$src_urls[]` array with urls to source json files (output from ffmap-backend)  
  `$json_file` target json file (where ffmap-d3 reads from)  
  

For any further questions feel free to contact me!  
Domnique Görsch <<ff@dgoersch.info>>
