===================================
 jvLogout extension for eZ Publish
===================================

**jvLogout** is a simple extension allowing you to perform actions when a user logouts from an eZ Publish site.
These actions are also known as **Logout Handlers**.


----------------------------
 Logout Handler Development
----------------------------

A Logout Handler consist of a simple class implementing **IJVLogoutHandler** interface.

All you need to do is to create a new class with a *handleLogout()* method and to declare
your logout handler class in **jvlogout.ini**.

Example :

::

  <?php
  class MyLogoutHandler implements IJVLogoutHandler
  {
      /**
       * Constructor
       */
      public function __construct()
      {
          
      }
      
      /**
       * Main method for your logout handler
       */
      public function handleLogout()
      {
          // Perform your custom logout actions here
      }
  }

Declare your logout handler class in an override of **jvlogout.ini** (let's say *settings/override/jvlogout.ini.append.php*)

::

  [LogoutSettings]
  AvailableHandlers[]=MyLogoutHandler


---------------------------------
 Custom redirection after logout
---------------------------------

To work properly, **jvLogout** overrides *[UserSettings].LogoutRedirect* from site.ini 
(see `my original blog post <http://share.ez.no/blogs/jerome-vieilledent/handle-logout-hooks>`_).

So in order to be able to make custom logout redirection, you can define your URI in an override of **jvlogout.ini** 
(defined to */user/login* by defaut, like the setting in site.ini) :

.. code-block:: ini
  [LogoutSettings]
  LogoutRedirect=/my/custom/uri

