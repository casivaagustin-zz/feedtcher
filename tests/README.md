Tests
=====

How to run test
===============

This libs goes in vendor/casivaagustin, in the same place than PHRequests. 

You need PHRequests installed first.

You need internet access, the tests fetch feeds from Internet

Your network must reject the url http://zaranga.lol.fail, some networks respond 
OK anyway to this kind of invalid urls.

Once you have everything ready you need to go to tests folder and run
phpunit from there.

  $phpunit

That is all folks.