Drupal ps_import.module README.txt
==============================================================================

This module allows you to import a set of nodes from a Comma Separated
Values (CSV) or Tab Separated Values (TSV) text file.

This version of the module only works on Drupal 6.x.

Installing ps_import (first time installation)
------------------------------------------------------------------------------

The module depends on:
- Date API (http://drupal.org/project/date).

Upgrading ps_import (on Drupal 5.x or 6.x)
------------------------------------------------------------------------------

Uninstalling ps_import
------------------------------------------------------------------------------

Documentation
------------------------------------------------------------------------------

If you install the "Advanced help" (http://drupal.org/project/advanced_help)
module, you can read the documentation on "admin/advanced_help/ps_import" on
your site.

Extending ps_import (for developers)
------------------------------------------------------------------------------

All code is documented. You can run:

  doxygen doxygen.txt

to generate the documentation in HTML format. The documentation is then
available on sites/all/modules/ps_import/help/devel/index.html.

Bugs and shortcomings
------------------------------------------------------------------------------

 * NOT ALL FEATURES ARE FULLY TESTED.

 * See http://drupal.org/project/issues/ps_import for a complete list of
   bugs and other problems.

 * The content types need to exist before starting the import. This module
   does not create content types!

Credits / Contact
------------------------------------------------------------------------------

The original author (version 4.5) of this module is Moshe Weitzman (weitzman).
Neil Drumm (drumm) rewrote the module for 4.6 (which he never released as
such).

The port of the module to 4.7 and some new features were provided by:
 - David Donohue (dado),
 - Nic Ivy (njivy).

Robrecht Jacques (robrechtj) is the current active maintainer of the module
and he provided the ports to 5.x and 6.x (rewrite).

Best way to contact the developers to report bugs or feature requests is by
visiting the ps_import project page at http://drupal.org/project/ps_import.

If you have a problem with a specific file (CSV or TSV), it helps the authors
if you attach a (small) file that shows the problem. When you do, mention how
you configured the type you are trying to import, eg what vocabularies you
have defined, whether the content type is event- or location-enabled, etc.

