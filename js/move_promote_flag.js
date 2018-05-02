// Minified with https://javascript-minifier.com/

// A flag link has been added to the repository item view page. The flag can
// be modified at /admin/structure/flags/manage/promote. The following code
// move the promote flag link into the primary tabs.
jQuery(
  function() {
    jQuery('ul.tabs-primary').append(jQuery('li.flag-promote').addClass('tabs-primary__tab'));
  }
);