Rivendell Metadata Website
==========================
WMFO - Tufts Freeform Radio  
ops@wmfo.org  
For copyrights and licensing, see COPYING.  

A simple website that allows anyone to browse tracks in a
[Rivendell](http://www.rivendellaudio.org/) library. See a working example at 
[rivendell.wmfo.org](http://rivendell.wmfo.org/).

Requires a local copy of [Twitter Bootstap](http://twitter.github.io/bootstrap/), [jQuery](http://jQuery.com), and `credentials.php`, whichdefines `$dbuser` and `$dbpass` for a SQL user with access to the Rivendell database. It is recommended you use an account with read-only access and no access to other databases. The site uses jQuery to load the results table when any of the input fields are altered, so disabling javascript will break this app. An alert is provided to indicate such.  

A Makefile is provided to install the php into the htdocs directory because
keeping files there under source control is a real pain. We reccomend you clone
the repo into a subdirectory of the admin's home folder.

WMFO is open to collaborating with the Rivendell community on this project.

Changelog
---------

###Early April 2013
Initial version - Nick Andre

###4/9/13
Prepare for publication on Github. - Max Goldstein
