ff-json-tools
=============

filter and merge nodes.json used by ffmap-d3


Little PHP script to filter nodes.json used by [ffmap-d3](https://github.com/ffruhr/ffmap-d3).

It takes the nodes.json created by the [ffmap-backend](https://github.com/ffruhr/ffmap-backend), parse it and take all legacy nodes, all nodes where the name match the filter, their client nodes and links to the target nodes.json.  
With the filtered nodes.json you can create maps that represent your community like [Freifunk Mönchengladbach](http://map.freifunk-moenchengladbach.de/graph.html) (which is part of the domain "Ruhrgebiet").

There are 3 vars you have to change for your needs:  
  `$src_url` source json file (output from ffmap-backend)  
  `json_file` target json file (where ffmap-d3 reads from)  
  `$filter_str` filter string (matched if string is _at the beginning_ of the nodes name)  
  
For any further questions feel free to contact me!  
Domnique Görsch <<ff@dgoersch.info>>
