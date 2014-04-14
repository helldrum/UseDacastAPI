PHP WRAPPER
============

To use it 
- add the Class folder in you project.
- use require_once function to add uses Class in your page
- set you API-Key and BID in constant like this 
(If you are more tha one account you can set more than one couple of API KEY and BID) 


define('BID', 'YOUR_BID');
define('API_KEY', 'YOUR_API_KEY');

create one (or more) new userSettings Object.

$userSettings = new UserApiSettings(BID, API_KEY);



If you want to manage live content you need to create a new live contener

$live = new Live; (use to containt the Live Data)

And create a LiveDAO object 

(use to interact with the API function)


You can get live data by Id

$error = $liveDao->getById('43364');

and display error is something get wrong

you need to get the current objet after call this function 

$live43364 = $liveDao->get_currentObjet();

and display the data of you live object in this way

 display the Description of the live 43364
 <?php echo $live43364->getDescription(); ?>


   
