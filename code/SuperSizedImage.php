<?php
/*
Copyright (c) 2012 Luis E. S. Dias - www.smartbyte.com.br

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
class SuperSizedImage extends Page {
    static $can_be_root = false;
    static $allowed_children = "none";
    static $default_parent = "SuperSizedPage";
    
    static $db = array(
        'Url' => 'Text'
    );
    
    static $has_one = array (
        'Image' => 'Image',
        'Thumb' => 'Image'
    );    
        
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        $fields->addFieldToTab('Root.Content.Main', new TextField('Url','URL'),'Content');
        $fields->addFieldToTab('Root.Content.Image', new ImageField('Image','Image'));
        $fields->addFieldToTab('Root.Content.Image', new ImageField('Thumb','Thumb'));        
        return $fields;
    }
        
}

class SuperSizedImage_Controller extends Page_Controller {
    
}