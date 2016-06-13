**DB Explorer**
- 
Tool for extraxting and analysing the database structure.

**Available Schemas**
 
Currently available database schema's are,

1. MySQL


**Sample Code :**

	"use shankarbala33\db_explorer\OTF_DB;"

Basic DB Connection [MySQL] :

    $db_schema = (
	 "name" => "mysql",
     "host" => "localhost",
     "username" => "root",
  	 "password" => "root",
     "database" => "wordpress"
    ); 

Scan Database :
 
     $database = new OTF_DB()     
     $database->scanDatabase($db_schema);

**Sample Output :**

	array:12 [▼
  	  "wp_commentmeta" => array:4 [▼
         0 => {#239 ▼
     	    +"TABLE_CATALOG": "def"
     	    +"TABLE_SCHEMA": "wordpress"
   		    +"TABLE_NAME": "wp_commentmeta"
    	    +"COLUMN_NAME": "meta_id"
   		    +"ORDINAL_POSITION": 1
   		    +"COLUMN_DEFAULT": null
    	    +"IS_NULLABLE": "NO"
     	    +"DATA_TYPE": "bigint"
   		    +"CHARACTER_MAXIMUM_LENGTH": null
  		    +"CHARACTER_OCTET_LENGTH": null
   		    +"NUMERIC_PRECISION": 20
    	    +"NUMERIC_SCALE": 0
    	    +"DATETIME_PRECISION": null
    	    +"CHARACTER_SET_NAME": null
     	    +"COLLATION_NAME": null
     	    +"COLUMN_TYPE": "bigint(20) unsigned"
     	    +"COLUMN_KEY": "PRI"
    	    +"EXTRA": "auto_increment"
     	    +"PRIVILEGES": "select,insert,update,references"
    	    +"COLUMN_COMMENT": ""
           }
    1 => {#240 ▶}
    2 => {#241 ▶}
    3 => {#242 ▶}
  		]
  	"wp_comments" => array:15 [▶]
  	"wp_links" => array:13 [▶]
  	"wp_options" => array:4 [▶]
  	"wp_postmeta" => array:4 [▶]
  	"wp_posts" => array:23 [▶]
  	"wp_term_relationships" => array:3 [▶]
  	"wp_term_taxonomy" => array:6 [▶]
  	"wp_termmeta" => array:4 [▶]
  	"wp_terms" => array:4 [▶]
  	"wp_usermeta" => array:4 [▶]
  	"wp_users" => array:10 [▶]
	] 
