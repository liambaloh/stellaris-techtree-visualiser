# stellaris-techtree-visualiser
This repository automatically creates a tech tree for the game Stellaris

To use, you must own the game itself, as the data for this comes from the game files and isn't included with this repository. 

To use:
* Checkout or download
* Install XAMPP or similar (PHP 7.0 or newer required)
* Create a folder: C:/XAMPP/htdocs/stellaristechtree and copy this repository there (or create a symlink). There should now be a file at C:/XAMPP/htdocs/stellaristechtree/index.php
* Start XAMPP (run XAMPP Contorl Panel -> Press "start" next to Apache)
* Navigate to http://localhost/stellaristechtree to verify it works. You should get _something_ (not a 404)
* Open the local install of Stellaris on your computer
* Copy the contents of the folder Stellaris/localisation/english and paste it into C:/XAMPP/htdocs/stellaristechtree/loc
* Copy the contents of the folder Stellaris/common/technology and paste it into C:/XAMPP/htdocs/stellaristechtree/tech
* Refresh http://localhost/stellaristechtree. The tech tree should now generate
