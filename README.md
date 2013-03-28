#SQLMap-Kiddies


A simple application which allow you to simply use SQLMap on a website, a unique page or a google dork.

##Options (not all implemented yet)

|                     Form option | Action                                    |
|:-------------------------------:|:-----------------------------------------:|
|  --data=DATA         |Data string to be sent through POST                   |
|  --dbms=DBMS         |Force back-end DBMS to this value                     |
|  --level=LEVEL       |Level of tests to perform (1-5, default 1)            |
|  --risk=RISK         |Risk of tests to perform (0-3, default 1)             |
|  --string=STRING     |String to match in page when the query is valid       |
|  --regexp=REGEXP     |Regexp to match in page when the query is valid       |
|  --text-only         |Compare pages based only on the textual content       |
|  --users             |Enumerate DBMS users                                  |
|  --passwords         |Enumerate DBMS users password hashes                  |
|  --privileges        |Enumerate DBMS users privileges                       |
|  --roles             |Enumerate DBMS users roles                            |
|  --dbs               |Enumerate DBMS databases                              |
|  --tables            |Enumerate DBMS database tables                        |
|  --columns           |Enumerate DBMS database table columns                 |
|  --dump              |Dump DBMS database table entries                      |
|  --dump-all          |Dump all DBMS databases tables entries                |
|  --search            |Search column(s), table(s) and/or database name(s)    |


##Cache your sitemaps !

When using the full website function, SQLMap-Kiddies build a full sitemap of the target and save it in cache.
You can easily choose wich sitemap you want to keep or delete.





|                               TO-DO List                                   |
|:--------------------------------------------------------------------------:|
|                        Finish google dork page                             |
|                     Allow to save and export dump                          |
|          Implementation : http://www.edge-security.com/wfuzz.php           |



