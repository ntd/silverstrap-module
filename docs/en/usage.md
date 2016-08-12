Usage
-----

This module basically provides access to the layout used by the
[silverstrap](http://silverstripe.entidi.com/themes/#TOC-1) templates
for generating a form.

A layout in SilverStrap is a set of classes to be applied to the
various components of the form. The default layout (`default`) keeps
the form fields inside a single column somewhat in the center of the
page.

You can override the default layout or provide your own. Custom layouts
are quite easy to implement: in fact before returning the fallback
layout, the code will check the current controller. If a layout
correspondent to `$controller->SilverstrapLayout` or
`$controller->class` is found, that one will be used instead.

Suppose for example you have this class:

    class MyController extends Controller
    {
        public function getSilverstrapLayout()
        {
            return 'multicol';
        }
        ...
    }

When rendering a form using the SilverStrap templates, firstly the
layout `multicol` will be used. If it does not exist, the layout
`MyController` will be used instead. If neither exist, it will be
used the `default` layout.

On the YAML side, an example implementation of the `multicol` layout
could be:

    ---
    Name: customlayout
    After:
      - silverstrap
    ---
    Silverstrap:
      layouts:
        multicol:
          group: form-group col-md-6 col-lg-4
          holder: col-xs-8 col-sm-6 col-md-8
          small_holder: col-xs-4 col-sm-3 col-md-4
          control: form-control
          label: control-label col-xs-4 col-sm-offset-1 col-sm-3 col-md-offset-0 col-md-4
          small_label: control-label
          right_label: control-label col-xs-4 col-sm-3 col-md-4
          small_right_label: control-label
          no_label: col-xs-offset-4
